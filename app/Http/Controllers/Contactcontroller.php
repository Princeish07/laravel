<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {    
        //fetching data from contacts database
        $data=Contact::all();
        return view('Pages.contact',compact('data'));
    }
    
}
