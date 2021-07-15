<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        $data=Contact::all()->toArray();
        return view('Pages.contact',compact('data'));
    }
    
}
