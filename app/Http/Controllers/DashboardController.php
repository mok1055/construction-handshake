<?php

namespace App\Http\Controllers;

use App\ProjectType;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', ['projects' => Auth::user()->projects()->get()]);
    }
}
