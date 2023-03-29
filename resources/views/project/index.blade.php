@extends('layouts.app')

@section('content')

<div>Current language: {{ Config::get('languages')[App::getLocale()] }}</div>
<div>
    <p>Select language:</p>
    @foreach (Config::get('languages') as $lang => $language)
        @if ($lang != App::getLocale())
            <a href="{{ route('lang.switch', $lang) }}"> 

            {{$language}}</a> 
        @endif
    @endforeach

</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Projects</h3>
    <a class="btn btn-primary" role="button" href="{{ route("project.create") }}">Create project</a>

    <table class="table table-sm">
        <thead>
        <tr>
            <th scope="col">#</th>  
            <th scope="col">Name</th>
            <th scope="col">Show</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($project as $projects)
            <tr>
                <th scope="row">{{ $projects->id }}</th>
            
                <td>
                    <div>{{ $projects->name}}</div>
                </td>
                            
                <td>
                    <form method="POST" action="{{ route("project.destroy", $projects->id) }}">

                        <a href="{{ route("project.show", $projects->id) }}">Show tasks</a>
                       
                        <a href="{{ route("project.edit", $projects->id) }}"><img src="/images/pencil.png" alt="Edit" width = "30" height = "30"> </a>
                      
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
