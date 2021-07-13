<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;

class Contactcontroller extends Controller
{
    public function show()
    {
        $data=user::all()->toArray();
        return view('Pages.contact',compact('data'));
    }
    
}
