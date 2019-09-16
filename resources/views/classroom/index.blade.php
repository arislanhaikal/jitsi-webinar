@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Classroom
        <a href="{{ route('classroom.create') }}" class="btn btn-success float-right btn-sm px-5">Add</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Participant</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($classrooms as $key => $class)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $class->class }}</td>
                    <td><a href="{{ route('room', $class->slug) }}" target="_blank">{{ $class->slug }}</a></td>
                    <td>{{ $class->totalParticipant }}</td>
                    <td>
                        <a href="{{ route('classroom.edit', $class) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form class="d-inline-block form-delete-list" onsubmit="if(!confirm('Yakin Hapus?')){return false;}" action="{{ route('classroom.destroy', $class) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection