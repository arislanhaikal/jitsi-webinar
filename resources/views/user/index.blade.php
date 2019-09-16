@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        Users
        <a href="{{ route('user.create') }}" class="btn btn-success float-right btn-sm px-5">Add</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="participant-tab" data-toggle="tab" href="#participant" role="tab" aria-controls="participant" aria-selected="true">Participant</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="speaker-tab" data-toggle="tab" href="#speaker" role="tab" aria-controls="speaker" aria-selected="false">Speaker</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="moderator-tab" data-toggle="tab" href="#moderator" role="tab" aria-controls="moderator" aria-selected="false">Moderator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Admin</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="participant" role="tabpanel" aria-labelledby="participant-tab">
                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col" class="border-top-0">#</th>
                        <th scope="col" class="border-top-0">Name</th>
                        <th scope="col" class="border-top-0">Email</th>
                        <th scope="col" class="border-top-0">Role</th>
                        <th scope="col" class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participants as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="d-inline-block form-delete-list" onsubmit="if(!confirm('Yakin Hapus?')){return false;}" action="{{ route('user.destroy', $user) }}" method="POST">
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
            <div class="tab-pane fade" id="speaker" role="tabpanel" aria-labelledby="speaker-tab">
                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col" class="border-top-0">#</th>
                        <th scope="col" class="border-top-0">Name</th>
                        <th scope="col" class="border-top-0">Email</th>
                        <th scope="col" class="border-top-0">Role</th>
                        <th scope="col" class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($speakers as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="d-inline-block form-delete-list" onsubmit="if(!confirm('Yakin Hapus?')){return false;}" action="{{ route('user.destroy', $user) }}" method="POST">
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
            <div class="tab-pane fade" id="moderator" role="tabpanel" aria-labelledby="moderator-tab">
                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col" class="border-top-0">#</th>
                        <th scope="col" class="border-top-0">Name</th>
                        <th scope="col" class="border-top-0">Email</th>
                        <th scope="col" class="border-top-0">Role</th>
                        <th scope="col" class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($moderators as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="d-inline-block form-delete-list" onsubmit="if(!confirm('Yakin Hapus?')){return false;}" action="{{ route('user.destroy', $user) }}" method="POST">
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
            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                <table class="table mt-3">
                    <thead>
                        <tr>
                        <th scope="col" class="border-top-0">#</th>
                        <th scope="col" class="border-top-0">Name</th>
                        <th scope="col" class="border-top-0">Email</th>
                        <th scope="col" class="border-top-0">Role</th>
                        <th scope="col" class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $key => $user)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="d-inline-block form-delete-list" onsubmit="if(!confirm('Yakin Hapus?')){return false;}" action="{{ route('user.destroy', $user) }}" method="POST">
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


    </div>
</div>
@endsection