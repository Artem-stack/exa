<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessPodcast;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Validator;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $i= Auth::user()->id;
       $project = Project::where('user_id', '=', $i)->get();

        return view('project.index', [
            "project" => $project,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
       return view("project.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
         $request->validate([
            'name' => 'required|min:2|max:255',
            'user_id' => 'required',
    ]);
       $data = $request->validated();

        Project::create($data);
  
    dispatch(new ProcessPodcast($data));
      

        return redirect(route("home"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $task = Task::where('project_id', '=', $id)->get();
       
        return view("task.index", [
            'project' => $project,
            'task' => $task,
        ]);
    }


     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $project = Project::findOrFail($id);

        return view("project.create", [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($id, ProjectRequest $request)
    {
        $project = Project::findOrFail($id);

        $project->update($request->validated());

        return redirect(route("home"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Project::destroy($id);

        return redirect(route("home"));
    }
}
