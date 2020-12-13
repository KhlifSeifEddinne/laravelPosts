@extends('layouts.app')

@section('content')
<h1>{{$post->title}}</h1>
<div>
{!! $post->body !!}
</div>
@if(Auth::user()->id == $post->user_id)
    <a href="/posts/{{ $post->id }}/edit">
@endif
<img style="width:30%" src="/storage/cover_images/{{ $post->cover_image }}">
    </a>
<hr><small>Written on {{$post->created_at}} By {{ $post->user->name }}</small>
<hr><a href='/posts' class="btn btn-dark ">Go Back</a>
@if(!Auth::guest())
@if(Auth::user()->id == $post->user_id)
<a href="/posts/{{ $post->id }}/edit" class="btn btn-default ">Edit</a>
<br><br>

{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
    {{form::hidden('_method', 'DELETE')}}
    {{form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!!form::close()!!}
@endif
@endif
@endsection
