<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login()
    {
    return view('pages.Login');
}
public function register()
    {
    return view('pages.Register');
}
}
