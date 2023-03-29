<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $project = Project::all();
        $task = Task::all();
        return view('home', [
            "project" => $project,
            "task" => $task,
        ]);

    }

     public function project($id)
    {
       $project = Project::findOrFail($id);
       $task = Task()->where('id', '=', 1);

        return view("project", [
            'project' => $project,
            'task' => $task,
        ]);
    }
}
