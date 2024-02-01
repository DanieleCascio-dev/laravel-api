@extends('layouts.admin')

@section('content')
  <div class="container">
    <h2 class="mt-3">Welcome to the Edit section</h2>
    <div class="row col-6">

      <form action=" {{ route('admin.types.update',['type'=>$type->slug])}}" method="POST">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
          <label for="name" class="form-label">Type name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
        </div>
        
        <button type="submit" class="btn btn-success">Save</button>
  
      </form>

    </div>

  </div>
@endsection