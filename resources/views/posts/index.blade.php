@extends('layouts.app')

@section('content')
<h3>All posts</h3>
{{-- <div class="list-group"> --}}
  @if (count($posts) > 0)
    @foreach ($posts as $post )
      <div class = "well" >
      <h3><a href = "/posts/{{$post->id}}">{{$post->title}}</a></h3>
      <small>Written on {{$post-> created_at}} By {{ $post->user->name }}</small>
      </div>
      @endforeach
      {{ $posts->links() }}
{{-- </div> --}}
<a href='/' class="btn btn-dark ">Back</a>
<a href = "/posts/create" class = "btn btn-success">Create</a>
  @else
    <p>No post found</p>
  @endif
@endsection
