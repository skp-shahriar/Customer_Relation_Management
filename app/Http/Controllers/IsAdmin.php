<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IsAdmin extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function customer ()
    {
        return view('customer');
    }
    public function leed()
    {
        return view('lead.lead');
    }
}
