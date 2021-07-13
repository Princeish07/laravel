<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\projects;

use App\Models\project_budget;
use App\Models\user;
use Illuminate\Support\Facades\DB;
use CreateProjectsTable;

class projectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=project::all()->toArray();
        // dd($data);
        $sno=0;
        return view('pages.show',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=user::all()->toArray();
        return view('pages.create',compact('data'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $request->file('project_file');
      $project=new project();
      $project->project_name=$request->project_name;
      $project->project_desc=$request->project_desc;
      $project->project_team=implode(',',$request->project_team);
      $project->project_file="1";
      $project->client_status=$request->client_status;
      $project->client_company=$request->client_company;
      $project->project_leader=$request->project_leader;
      $id=$request->project_id;
      $project->save();
      
      $project_budget=new project_budget();
      $project_budget->project_id=$id;
      $project_budget->estimated_budget=$request->estimated_budget;
      $project_budget->amount_spent=$request->amount_spent;
      $project_budget->estimated_duration=$request->estimated_duration;
      
      $project_budget->save();
      return redirect()->route('projects.index')
      ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param   \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project_id )
    {
        $project_budget=project_budget::find($project_id)->toArray();
        $project=project::find($project_id)->toArray();
        return view('pages.Project_details', compact('project','project_budget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id)
    {
        $data=user::all()->toArray();
        $project_budget=project_budget::find($project_id)->toArray();
        $project=project::find($project_id)->toArray();
        return view('pages.Project_Edit',compact('project','project_budget'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $project_id)
    {
        //
        $project=project::find($project_id);
        $project->project_name=$req->project_name;
        $project->project_desc=$req->project_desc;
        $project->project_team=implode(",",$req->project_team);
        $project->project_file="1";
        $project->client_status=$req->client_status;
        $project->client_company=$req->client_company;
        $project->project_leader=$req->project_leader;
        $project->update();
        $project_budget=project_budget::find($project_id);
        $project_budget->estimated_budget=$req->estimated_budget;
        $project_budget->amount_spent=$req->amount_spent;
        $project_budget->estimated_duration=$req->estimated_duration;
        $project_budget->update();
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($project_id)
    {
        //
        $project=project::find($project_id);
        $project->delete();
        $project_budget=project_budget::find($project_id);
        $project_budget->delete();
        //return view('pages.show');
        //return \Redirect::route('display');
         return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
