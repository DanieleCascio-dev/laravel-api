@extends('layouts.admin')

@section('content')
  <div class="container mt-5">
    <h2 class="mb-2">{{ Auth::user()->name }} here you can find all the Types</h2>
    <table class="table table-dark table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Actions</th>
        
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type)
        
        <tr>
          <th scope="row">{{ $type->id }}</th>
          <td>{{ $type->name}}</td>
          <td>
            <a class="btn btn-success" href="{{ route('admin.types.show',['type'=>$type->slug]) }}">Details</a>
            <a class="btn btn-warning" href="{{ route('admin.types.edit',['type'=>$type->slug]) }}">Edit</a>
          </td>
         
        </tr>

        @endforeach
        
      </tbody>
    </table>
  </div>
@endsection