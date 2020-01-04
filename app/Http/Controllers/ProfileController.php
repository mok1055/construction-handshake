<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\ProjectStatus;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('view-profile');
    }

    public function update(Request $request, $id)
    {
        Auth::user()->update(array(
            'first_name'   => $request->first_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email
        ));
        return redirect('view-profile');
    }
}
