@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
<div>
{!! $post->body !!}
</div>
<hr><small>Written on {{$post->created_at}} By {{ $post->user->name }}</small>
<hr><a href='/posts' class="btn btn-dark ">Go Back</a>
<a href="/posts/{{ $post->id }}/edit" class="btn btn-default ">Edit</a>
<br><br>

{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{form::hidden('_method', 'DELETE')}}
    {{form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!form::close()!!}

@endsection
