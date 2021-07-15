<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\project_budget;



class Projectviewcontroller extends Controller
{
    public function show()
    {
        // $data=project::join('project_budgets','project_budgets.project_id','=','projects.project_id')->get(['projects.*','project_budgets.estimated_budget']);
        // $data=project::all()->toArray();
        // dd($data);
        $data=project_budget::with('project')->get();
        $sno=0;
        return view('pages.show',compact('data'));
    }
}
