<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
            'email'         =>  'required|email',
            'password'      =>  'required'
        ]);
        $user_data = array(
            'email'         => $request->get('email'),
            'password'      => $request->get('password')
        );
        if (Auth::attempt($user_data)) {
            return redirect('dashboard');
        } else {
            return back()->with('error', 'Incorrect login credentials');
        }
    }

    public function successLogin()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}
