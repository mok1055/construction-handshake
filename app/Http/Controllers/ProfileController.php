<?php

namespace App\Http\Controllers;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function Return() {
        return view('dashboard');
    }
}
