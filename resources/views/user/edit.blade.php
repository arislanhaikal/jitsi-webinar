@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">Edit</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::model($user, ['route' => ['user.update', $user], 'method' =>'patch']) !!}
            @include('user._form', ['model' => $user])
        {!! Form::close() !!}
    </div>
</div>
@endsection