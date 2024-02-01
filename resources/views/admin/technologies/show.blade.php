@extends('layouts.admin')

@section('content')

<div class="container mt-3">
  @include('partials.go_back')
  <div class="row">
    <div class="col-6">

      <h2>Here you find the technology details</h2>
      <p><strong>Name: </strong>{{$technology->name}}</p>
      <p><strong>Created date: </strong>{{$technology->created_at}}</p>
      <p class="w-25" ><strong>Color: </strong><span class="d-inline-block" style="background-color:{{ $technology->hex_color }}">{{$technology->hex_color}} </span></p>
      <p><strong>Slug: </strong>{{$technology->slug}}</p>

    </div>
  </div>
  
</div>
  
@endsection