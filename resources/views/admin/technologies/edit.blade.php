@extends('layouts.admin')

@section('content')
  <div class="container mt-3">
    <h2 class="mb-5">Here you con modify the technology</h2>

    <form action="{{ route('admin.technologies.update',['technology'=>$technology->id])}}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">

        <label for="name">Name</label>
        <input  type="text" id="name" value="{{old('name',$technology->name)}}" name="name">
        
      </div>

      <div class="mb-3">

        <label for="color">Hex Color</label>
        <input
        type="color" class="form-control form-control-color"
        id="color"
        value="{{old('hex_color',$technology->hex_color)}}"
        title="Choose your color" name="hex_color"
        >

      </div>
      
      
      <button type="submit" class="btn btn-success">Save</button>
    </form>
  </div>
@endsection