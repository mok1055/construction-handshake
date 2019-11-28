<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $projects = DB::table('project')
                    ->join('project_user', function ($join) {
                        $join->on('project_user.project_id', '=', 'project.project_id')
                             ->where('project_user.user_id', '=', Auth()->id());
                    })
                    ->get();
        return view('dashboard', ['projects' => $projects]);
   }
}
