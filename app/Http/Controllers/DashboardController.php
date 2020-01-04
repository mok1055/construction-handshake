<?php

namespace App\Http\Controllers;

use App\ProjectType;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect('home');
        }
        return view('dashboard', ['projects' => Auth::user()->projects()->get()]);
    }
}
