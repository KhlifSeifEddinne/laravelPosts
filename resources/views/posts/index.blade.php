@extends('layouts.app')

@section('content')
<h3>All posts</h3>
  @if (count($posts) > 0)
    @foreach ($posts as $post )
      <div class = "well" >
          <div class="row">
              <div clss="col-md-4 col-sm-4">
                <a href = "/posts/{{ $post->id }}"><img style="width:100%" src="/storage/cover_images/{{ $post->cover_image }}"></a><br><br>
              </div>&nbsp &nbsp &nbsp
              <div clss="col-md-8 col-sm-8">
                  <h3><a href = "/posts/{{$post->id}}">{{$post->title}}</a></h3>
                  <small>Written on {{$post-> created_at}} By {{ $post->user->name }}</small>
              </div>
            </div>
        </div>
      @endforeach
      {{ $posts->links() }}
{{-- </div> --}}
<a href='/' class="btn btn-dark ">Back</a>
@else
<p>No post found</p>
@endif
@if(!Auth::guest())
<a href = "/posts/create" class = "btn btn-success">Create</a>
@endif
@endsection
