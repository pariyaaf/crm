<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Client;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
   
   public function index()
   {
       $projects = Project::latest()->paginate(5);
       return view('projects.index', compact('projects'))->with('i', (request()->input('page',1)-1)*5);
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
    $clients = Client::all(['id','company_name']);
    return view('projects.create', compact('clients'));

   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       
           $request->validate([
               'name' => 'required',
               'client_id' => 'required',
           ]);   

           $project = new Project;
           $project->name = $request->name;
           $project->client_id = $request->client_id;
           $project->owner_id = Auth::id();
           $project->save();
           
           return redirect()->route('projects.index')->with('success','projects created successfully.');
   
       
   }

   /**
    * Display the specified resource.
    */
   public function show(Project $project)
   {
       return view('projects.show', compact('project'));

   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Project $project)
   {
       return view('projects.edit',compact('project'));

   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request,  Project $project)
   {
       
       $request->validate([
           'name'=> 'required',
           'client_id' => 'required',
        ]);

       $project->update($request->all());
       return redirect()->route('projects.index')->with('success','project updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Project $project)
   {
       $project->delete();
       return redirect()->route('projects.index')->with('success','project deleted successfully');

   }
}
