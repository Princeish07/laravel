<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\project_budget;



class ProjectviewController extends Controller
{
    public function show()
    {
        $data=Project_budget::with('project')->get();
        $sno=0;
        return view('pages.show',compact('data'));
    }
}
