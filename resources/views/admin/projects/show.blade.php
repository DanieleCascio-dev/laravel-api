@extends('layouts.admin')

@section('content')
  <div class="container mt-3 p-2">
    <div>
      <strong>Technologies:</strong>
      @if (count($project->technologies) > 0)
          
      @foreach ($project->technologies as $technology)
      <span class="badge" style="background-color:{{$technology->hex_color}}">{{ $technology->name }} </span>
          
      @endforeach
      @else
          <span>There's no technologies in this project</span>
      @endif
    </div>
    @include('partials.go_back')
    <h2>Project details:</h2>
    <h3><strong>Title: </strong>{{ $project->title }}</h3>
    <p><strong>Description: </strong>{{ $project->description }}</p>
    <p><strong>Slug: </strong>{{ $project->slug }}</p>
    <p><strong>Creation date: </strong>{{ $project->created_at }}</p>
    <p><strong>Project Type: </strong>{{ $project->type?->name }}</p>
    @if ($project->image_path)
      <div class="mb-3">
        <p><strong>Image:</strong></p>
        <img src="{{asset('storage/' .  $project->image_path) }}" alt="">
      </div>
    
        
    @endif
    

    <div class="d-flex gap-2">

      @include('partials.editbtn')
      @include('partials.delete')

    </div>
  </div>
@endsection