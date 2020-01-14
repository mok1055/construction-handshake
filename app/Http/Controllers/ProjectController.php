<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProjectStatus;
use App\ProjectUser;
use App\User;
use Auth;


class ProjectController extends Controller
{

    public function index()
    {
        return Project::all();
    }

    public function create()
    {
        if (Auth::user() != null && Auth::user()->role() != 'Opdrachtgever') {
            return abort(403);
        }
        return view('create-project', ['statuses' => ProjectStatus::all()]);
    }

    public function store(ProjectRequest $request)
    {
        if (Auth::user() != null && Auth::user()->role() != 'Opdrachtgever') {
            return abort(403);
        }
        $project = Project::create(array(
            'name'          => $request->name,
            'description'   => $request->description == null ? "" : $request->description,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date
        ));
        ProjectUser::create(array(
            'user_id' => Auth::user()->id,
            'project_id' => $project->id
        ));
        return redirect('dashboard');
    }

    public function show($id)
    {
        return view('view-project', ['project' => Project::find($id)]);
    }

    public function edit($id)
    {
        if (Auth::user() != null && Auth::user()->role() != 'Opdrachtgever') {
            return abort(403);
        }
        return view('edit-project', ['project' => Project::find($id),
            'statuses' => ProjectStatus::all()]);
    }


    public function update(ProjectRequest $request, $id)
    {
        if (Auth::user() != null && Auth::user()->role() != 'Opdrachtgever') {
            return abort(403);
        }
        $type = $request->input('action');
        $project = Project::find($id);
        if ($type == 'update') {
            $project->update(array(
                'name' => $request->name,
                'description' => $request->description == null ? "" : $request->description,
                'status_id' => ProjectStatus::find($request->status)->id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ));
            return redirect('dashboard');
        } else {
            $user = User::where('email', 'like', $request->email)->first();
            if ($user == null) {
                return back()->withErrors(['De gebruiker bestaat niet!']);
            }
            if ($project->contains($user)) {
                return back()->withErrors(['De gebruiker zit al in het project!']);
            }
            ProjectUser::create(array(
                'user_id'    => $user->id,
                'project_id' => $id
            ));
            return back()->with('success', 'De gebruiker is toegevoegd aan het project!');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function viewUsers($id)
    {
        $project = Project::find($id)->first();
        if ($project != null) {
            return view('view-users', ['project' => $project]);
        }
        return back();
    }

    public function deleteUser($projectId, $userId) {
        $project = Project::find($projectId)->first();
        if ($project != null) {
            $user = ProjectUser::find($projectId, $userId)->first();
            if ($user != null) {
                $user->delete();
                return back();
            }
        }
        //return viewUsers($projectId);
    }


}
