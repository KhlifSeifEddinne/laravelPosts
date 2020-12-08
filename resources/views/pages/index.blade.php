@extends('layouts.app')
@section('content')
   <section class="jumbotron text-center">
    <div class="container">
      <h1>Welcome</h1>
      <p class="lead text-muted">This is my application.</p>
      <p>
        <a href="/register" class="btn btn-primary my-2">Sign up</a>
        <a href="/login" class="btn btn-success">Login</a>
      </p>
    </div>
  </section>

@endsection
