@extends('layouts.admin')

@section('content')
<div class="container">

  <h2>Welcome to the admin area!</h2>
  <h3>Here you can find all the projects</h3>
  
  <div class="text-end py-2">
    <a class="btn btn-success " href="{{ route('admin.projects.create')}}">Add a new project</a>
  </div>
  @if (empty($projects))
      <h2>You have no project! Let's start a new one!</h2>
  @else
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Slug</th>
        <th scope="col">Creation date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($projects as $project)
      
      <tr>
        <td>{{ $project->title }}</td>
        <td>{{ $project->description }}</td>
        <td>{{ $project->slug }}</td>
        <td>{{ $project->created_at }}</td>
        <td> <a class="btn btn-success mb-1" href="{{ route('admin.projects.show',['project'=> $project->slug ])}}">Details</a>
             @include('partials.editbtn')
             @include('partials.delete')
        </td>
      </tr>

        @endforeach
    </tbody>
  </table>
  @endif

 <div>
  {{ $projects->links() }}
 </div>
</div>
@endsection