@extends('layouts.app')

@section('content')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <div class="container mx-auto px-6 py-8">
      
       <h3 class="text-gray-700 text-3xl font-medium">Project tasks: {{$project->name}}</h3>
    <a class="btn btn-primary" role="button" href="{{ route("task.create", $project->id) }}">Create task</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>  
            <th scope="col">Name</th>
            <th scope="col">images</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
           
        @foreach($task as $tasks)
            <tr>
                <th scope="row">{{ $tasks->id }}</th>
            
                <td>
                    <div>{{ $tasks->name }}</div>
                </td>

               <td>
                    <div><img src="/image/{{ $tasks->image }}" width="50px"  height="50px" background-position= "center center";></div>
                </td>

                  <td>
                    <div>{{ $tasks->status['name'] }}</div>
                </td>
                            
                <td>
                    <form method="POST" action="{{ route("task.destroy", $tasks->id) }}">
                       
                        <a href="{{ route("task.edit", $tasks->id) }}"><img src="/images/pencil.png" alt="Edit" width = "30" height = "30"> </a>
                      
                        @csrf
                        @method('DELETE')
                         <td>
                        <button><img src="/images/delete.png" alt="Delete" width = "30" height = "30"></button>
                         </td>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

