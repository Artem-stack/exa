<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Status;
use Validator;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Mail;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $project = Project::all();
        $task = Task::all();
       
        return view("task.index", [
            'project' => $project,
            'task' => $task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $i= Auth::user()->id;
       $projec = Project::where('user_id', '=', $i)->get();
        $status = Status::all();
         return view("task.create", [
           'projec' => $projec,
            'status' => $status,
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
         $request->validate([
            'name' => 'required|min:2|max:255',
            'status_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_id' => 'required',
    ]);

       $data = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        Task::create($data);

        $user_email= Auth::user()->email;
        
            // Mail::to($user_email)->send(new SendMail($user_email));
        

        return redirect(route("home"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $i= Auth::user()->id;
       $projec = Project::where('user_id', '=', $i)->get();
         $task = Task::findOrFail($id);
         $status = Status::all();

        return view("task.create", [
            'task' => $task,
            'projec' => $projec,
            'status' => $status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TaskRequest $request)
    {
        $task = Task::findOrFail($id);


        $task->update($request->validated());

        return redirect(route("home"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
       Task::destroy($id);

        return back();
    }
}
