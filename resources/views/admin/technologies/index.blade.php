@extends('layouts.admin')

@section('content')
  <div class="container mt-3">
    <h2>Here you can find all the tecnologies</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Color</th>
          <th scope="col">action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($technologies as $technology)
            
        <tr >
          <td style="background-color:{{$technology->hex_color}}">{{$technology->id}}</td>
          <th style="background-color:{{$technology->hex_color}}">{{$technology->name}}</th>
          <td style="background-color:{{$technology->hex_color}}">{{$technology->hex_color}}</td>
          <td>
            <a href="{{route('admin.technologies.show',['technology'=>$technology->id])}}" class="btn btn-success">Details</a>
            <a href="{{route('admin.technologies.edit',['technology'=>$technology->id])}}" class="btn btn-warning">Edit</a>
          </td>
        </tr>
        
        @endforeach
      </tbody>
    </table>
  </div>
@endsection