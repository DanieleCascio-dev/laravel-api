@extends('layouts.admin')

@section('content')
  <div class="container">
    <h2>Create a new project</h2>
 
    
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>

        @foreach ($errors->all() as $error)
  
          <li>
              {{$error}}
          </li>
            
        @endforeach
      </ul>
    </div>
    @endif

    <form class="col-6" action="{{ route('admin.projects.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input required type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="2" name="description"> {{ old('description')}} </textarea>
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Project Type</label>
        <select name="type_id" id="type" class="form-select">
          <option value="">Select one Type</option>
          @foreach ($types as $type)

          <option value="{{ $type->id }}">{{ $type->name }}</option>
              
          @endforeach
        </select>
      </div>

      @foreach ($technologies as $technology)
        <div class="form-check">
 
          <input @checked(in_array($technology->id,old('technologies',[]))) class="form-check-input" type="checkbox" id="tech-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]">
          <label class="form-check-label for="tech-{{ $technology->id }}">{{ $technology->name }}</label>

        </div>
        @endforeach
        
        <button class="btn btn-success">Save</button>
    </form>
  </div>
@endsection