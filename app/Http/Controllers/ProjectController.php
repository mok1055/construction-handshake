<?php

namespace App\Http\Controllers;

use App\ProjectStatus;
use Illuminate\Http\Request;
use App\Project;
use App\ProjectUser;
use Auth;
use App\Http\Requests\ProjectRequest;


class ProjectController extends Controller
{

    public function index()
    {
        return Project::all();
    }

    public function create()
    {
        return view('create-project', ['statuses' => ProjectStatus::all()]);
    }

    public function store(ProjectRequest $request)
    {
        $project = Project::create(array(
            'name'          => $request->name,
            'description'   => $request->description,
            //'status_id'     => ProjectStatus::where('name', $request->status)->first()->id,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date
        ));
        ProjectUser::create(array(
            'user_id'     => Auth::user()->id,
            'project_id'  => $project->id
        ));
        return redirect('dashboard');
    }

    public function show($id)
    {
        return Project::all()->where('project_id', $id)->first();
    }

    public function edit($id)
    {
        return view('edit-project', ['project' => Project::find($id),
                                           'statuses' => ProjectStatus::all()]);
    }


    public function update(ProjectRequest $request, $id)
    {
        $project = Project::find($id);
        $project->update(array(
            'name'          => $request->name,
            'description'   => $request->description,
            'status_id'     => ProjectStatus::find($request->status)->id,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date
        ));
        return redirect('dashboard');
    }

    public function destroy($id)
    {
        //
    }

}
