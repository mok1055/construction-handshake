<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\ProjectUser;
use Auth;
use Carbon\Carbon;


class ProjectController extends Controller
{

    public function index()
    {
        return Project::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if ($request->start_date < Carbon::now()) {
            return 'start date cannot be in the past';
        }
        if ($request->end_date < $request->start_date) {
            return 'end date cannot be before the start date';
        }
        $project = Project::create(array(
            'name'        => $request->name,
            'description' => $request->description,
            'type'        => $request->type,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date
        ));
        ProjectUser::create(array(
            'user_id'     => Auth::user()->user_id,
            'project_id'  => $project->project_id
        ));
        return redirect('dashboard');
    }

    public function show($id)
    {
        return Project::all()->where('project_id', $id)->first();
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
