@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>How To Create CRUD Operation In Laravel 10 - index view</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New project</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>company id</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->client_id }}</td>
            <td>
                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $projects->links() !!}
      
@endsection