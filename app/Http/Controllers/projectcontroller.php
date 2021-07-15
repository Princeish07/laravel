<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectBudget;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use CreateProjectsTable;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data=Project::with('project_budgets')->get();
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
        $data=User::all()->toArray();
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
      
      $project=new Project();
      $project_budget=new ProjectBudget();
      $project->project_name=$request->project_name;
      $project->project_desc=$request->project_desc;
      $project->project_team=implode(',',$request->project_team);
      $project->client_status=$request->client_status;
      $project->client_company=$request->client_company;
      $project->project_leader=$request->project_leader; 
      $project->save();

      $id=$project->id; 
      $project_budget->id=$request->id;
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
    public function show(Request $request,$id )
    {
        $project=Project::with('project_budgets')->find($id);
        return view('pages.Project_details', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::all();
        $project=Project::with('project_budgets')->find($id);
        return view('pages.Project_Edit',compact('project'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        
        $files = [];
        if($req->hasfile('project_file'))
         {
            $projectfile=implode(",",$req->file('project_file')); 
            foreach($req->file('project_file') as $file=>$key)
            {
                $newFilename=$key->getClientOriginalName();
                 $key->move(public_path('storage'), $newFilename);  
                 array_push($files,$newFilename);

            }
            $projectfile=implode(",",$files);
            $project=Project::find($id);
            $project->project_file = $projectfile;
            $project->update();
         }
        elseif($req->has('project_name')){
        $project=Project::find($id);
        $project->project_name=$req->project_name;
        $project->project_desc=$req->project_desc;
        $project->project_team=implode(",",$req->project_team);
        $project->client_status=$req->client_status;
        $project->client_company=$req->client_company;
        $project->project_leader=$req->project_leader;
        $project->update();
        $project_budget=ProjectBudget::find($id);
        $project_budget->estimated_budget=$req->estimated_budget;
        $project_budget->amount_spent=$req->amount_spent;
        $project_budget->estimated_duration=$req->estimated_duration;
        $project_budget->update();
        }
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        $project->delete();
         return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully');
    }
}
