@extends('layouts.app')

@section('content')
<h3>Create post</h3>
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST' ]) !!}
    <div class = "form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        {{ Form::label('body', 'Body') }}
        {{ Form::textArea('body', '', ['id'=>"summary-ckeditor", 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <a href = "/posts" class = "btn btn-dark">Back</a>
    {{Form::submit('Create', ['class' => "btn btn-primary"])}}
{!! Form::close() !!}

@endsection
