<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{
  
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        return view('tasks.index', compact('tasks'))->with('i', (request()->input('page',1)-1)*5);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     $users = User::all(['id','name']);
     return view('tasks.create', compact('users'));
 
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
            // $request->validate([
            //     'name' => 'required',
            //     'task_for_id' => 'required',
            // ]);   
 
            $task = new Task;
            $task->name = $request->name;
            $task->task_for_id = $request->task_for_id;
            $task->creator_id = Auth::id();
            $task->save();
            
            return redirect()->route('tasks.index')->with('success','tasks created successfully.');
    
        
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
 
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit',compact('task'));
 
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Task $task)
    {
        
        $request->validate([
            'name'=> 'required',
            'task_for_id' => 'required',
         ]);
 
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success','task updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','task deleted successfully');
 
    }
}
