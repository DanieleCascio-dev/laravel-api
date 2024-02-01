@extends('layouts.admin')

@section('content')
  <div class="container">
    @include('partials.go_back')
    <h2>All the details</h2>
    <h4><strong>Name: </strong> {{$type->name}} </h4>
    <div><strong>Projects: </strong>
      <ul>
        @foreach ($type->projects as $project)
            <li>{{ $project->title }}</li>
        @endforeach
      </ul>
      </div>
  </div>
@endsection