<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Http\Requests\Classroom\StoreRequest;
use App\Http\Requests\Classroom\UpdateRequest;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $speakers = User::where('role', 'speaker')->get()->pluck('name', 'id');
        $moderators = User::where('role', 'moderator')->get()->pluck('name', 'id');
        $participants = User::where('role', 'student')->get()->pluck('name', 'id');

        return view('classroom.create', compact('speakers', 'moderators', 'participants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $classroom = Classroom::create($request->all());
            foreach($request->participant as $participant)
            {
                $classroom->participants()->create(['user_id' => $participant]);
            }
            $classroom->participants()->create(['user_id' => $request->speaker]);
            $classroom->participants()->create(['user_id' => $request->moderator]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('classroom.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return view('classroom.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        $speakers = User::where('role', 'speaker')->get()->pluck('name', 'id');
        $moderators = User::where('role', 'moderator')->get()->pluck('name', 'id');
        $participants = User::where('role', 'student')->get()->pluck('name', 'id');

        return view('classroom.edit', compact('classroom', 'speakers', 'moderators', 'participants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Classroom $classroom)
    {
        DB::beginTransaction();
        try {
            $classroom->update($request->all());
            foreach($request->participant as $participant)
            {
                $classroom->participants()->create(['user_id' => $participant]);
            }
            // $classroom->participants()->create(['user_id' => $request->speaker]);
            // $classroom->participants()->create(['user_id' => $request->moderator]); 
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('classroom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classroom.index');
    }

    public function room($slug)
    {
        $room = Classroom::where('slug', $slug)->firstOrFail();
        $participant = $room->participants()->where('user_id', \Auth::id())->first();
        $jwt = $this->getJwtToken($participant, $room);

        if($participant) {
            return view('room', compact('room', 'participant', 'jwt'));
        }

        return abort(404);
    }

    public function getJwtToken($participant, $room)
    {
        // Create token header as a JSON string
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256','kid' => 'jitsi/aqi',]);

        // Create token payload as a JSON string
        $payload = json_encode([
                "context" => [
                    "user" => [
                        "avatar" => "https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg",
                        "name" => $participant->user->name,
                        "email" => $participant->user->email,
                        "id" => $participant->user->id
                    ],
                    "group" => "Ph4uK"
                ],
                "aud" => "jitsi",
                "iss" => "my_client",
                "sub" => "webinar.aqi.co.id",
                "room" => $room->slug,
                "exp" => 1500006923
            ]);

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'aqi2019!', true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }
}
