<?php

namespace App\Http\Controllers;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['projects' => Auth::user()->projects()->get()]);
    }

    public function createProject() {
        return view('create-project');
    }
}
