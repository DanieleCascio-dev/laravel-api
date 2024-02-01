<form action=" {{ route('admin.projects.destroy', ['project'=>$project->slug])}}" method="POST">
@csrf
@method('DELETE')
<button class="btn btn-danger">Delete</button>
</form>