@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href = "/posts/create" class="btn btn-primary">Create Post</a><hr>
                    <h3> Your Blog Posts</h3>
                    @if(count($posts)>0)
                    <table class = "table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($posts as $post)
                            <tr>
                                <th><a href="/posts/{{ $post->id }}"> {{ $post->title }}</a></th>
                                <td><a href = "/posts/{{$post->id}}/edit" class = "btn btn-success">Edit</a></td>
                                <td>{!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                    {{form::hidden('_method', 'DELETE')}}
                                    {{form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!!form::close()!!}</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You have no posts</p>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
