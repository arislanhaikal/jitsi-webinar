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

        {!! Form::model($classroom, ['route' => ['classroom.update', $classroom], 'method' =>'patch']) !!}
            @include('classroom._form', ['model' => $classroom])
        {!! Form::close() !!}
    </div>
</div>
@endsection