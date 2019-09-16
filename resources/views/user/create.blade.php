@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">Create</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! Form::open(['route' => 'user.store']) !!}
            @include('user._form')
        {!! Form::close() !!}
    </div>
</div>
@endsection