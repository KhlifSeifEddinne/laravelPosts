@extends('layouts.app')
@section('content')
    <h1>{{$Title}}</h1><br>
    <p>This is the services page.</p>
    @if (count ($services) > 0)
       <ul class="list-group" >
          @foreach ($services as $services )
             <li class="list-group-item">{{$services}}</li>
          @endforeach
        </ul>
    @endif
@endsection
