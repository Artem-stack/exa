@extends('layouts.app')

@section('title',  isset($projects) ? "Edit project ID {$projects->id}" : 'Add project')

@section('content')

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" />

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($projects) ? "Edit project ID {$projects->id}" : 'Add project' }}</h3>

        <div class="mt-8">
             <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($project) ? route("project.update", $project->id) : route('project.store') }}">
                @csrf

                @if(isset($project))
                    <input type="hidden" name="id" value="{{ $project->id }}"/>

                    @method('PUT')
                @endif

                <input name="name" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('name') border-red-500 @enderror" placeholder="name" value="{{ $project->name ?? '' }}" />

                @error('name')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <?php $user_id = Auth::user()->id; ?>
                 <input name="user_id" type="hidden" value="{{ $user_id ?? '' }}" />
                 
                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Save</button>
            </form>
        </div>
    </div>
@endsection
