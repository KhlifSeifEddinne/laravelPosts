@extends('layouts.app')

@section('content')
<h3>Create post</h3>
{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class = "form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        {{ Form::label('body', 'Body') }}
        {{ Form::textArea('body', $post->body, ['id'=>"summary-ckeditor", 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class = "form-group">
        {{ Form::file('cover_image') }}
    </div>
    <a href = "/posts" class = "btn btn-dark">Back</a>
    {{Form::submit('Edit', ['class' => "btn btn-primary"])}}
    {{ form::hidden('_method','PUT') }}
{!! Form::close() !!}

@endsection
