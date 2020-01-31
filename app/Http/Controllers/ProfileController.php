<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('view-profile');
    }

    public function update(Request $request)
    {
        Auth::user()->update(array(
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email
        ));
        return redirect('dashboard');
    }
}
