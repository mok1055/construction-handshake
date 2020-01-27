<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\ProjectStatus;
use App\ProjectUser;
use App\Rating;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{

    public function index()
    {
        return view('view-projects', ['projects' => Auth::user()->projects()]);
    }

    public function create()
    {
        if (Auth::user() != null && !Auth::user()->canCreateEditProject()) {
            return abort(403);
        }
        return view('create-project', ['statuses' => ProjectStatus::all()]);
    }

    public function store(ProjectRequest $request)
    {
        if (Auth::user() != null && !Auth::user()->canCreateEditProject()) {
            return abort(403);
        }
        $project = Project::create(array(
            'name' => $request->name,
            'description' => $request->description == null ? "" : $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ));
        ProjectUser::create(array(
            'user_id' => Auth::user()->id,
            'project_id' => $project->id
        ));
        return redirect('dashboard');
    }

    public function show($id)
    {
        return view('view-project', ['project' => Project::find($id),
            'statuses' => ProjectStatus::all()]);
    }

    public function edit($id)
    {
        if (Auth::user() != null && !Auth::user()->canCreateEditProject()) {
            return abort(403);
        }
        return view('edit-project', ['project' => Project::find($id),
            'statuses' => ProjectStatus::all()]);
    }


    public function update(ProjectRequest $request, $id)
    {
        if (Auth::user() != null && !Auth::user()->canCreateEditProject() && !Auth::user()->canAddUserToProject()) {
            return abort(403);
        }
        $project = Project::find($id);
        $project->update(array(
            'name' => $request->name,
            'description' => $request->description == null ? "" : $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ));
        return back()->with('success', 'De wijzigingen zijn opgeslagen!');
    }

    public function destroy($id)
    {
        //
    }

    public function viewUsers($id)
    {
        $project = Project::find($id);
        if ($project != null) {
            return view('view-users', ['project' => $project]);
        }
        return back();
    }

    public function addUser(Request $request, $id)
    {
        $project = Project::find($id);
        if (Auth::user() != null && !Auth::user()->canAddDeleteUser()) {
            return abort(403);
        }
        $user = User::where('email', 'like', $request->email)->first();
        if ($user == null) {
            return back()->withErrors(['De gebruiker bestaat niet!']);
        }
        if ($project->contains($user)) {
            return back()->withErrors(['De gebruiker zit al in het project!']);
        }
        ProjectUser::create(array(
            'user_id' => $user->id,
            'project_id' => $id
        ));
        return back()->with('success', 'De gebruiker is toegevoegd aan het project!');
    }

    public function deleteUser($projectId, $userId)
    {
        $project = Project::find($projectId);
        if ($project != null) {
            $projectUser = ProjectUser::find($projectId, $userId)->first();
            if ($projectUser != null) {
                $projectUser->where('user_id', $userId)->where('project_id', $projectId)->delete();
                return back()->with('success', 'De gebruiker is verwijderd van het project!');
            }
            return back();
        }
        return back();
    }

    public function editMetaData(Request $request, $id)
    {
        $project = Project::find($id);
        if ($project == null) {
            return back();
        }
        $type = $request->input('action');
        if ($type == 'add-user') {
            $user = User::where('email', 'like', $request->email)->first();
            if ($user == null) {
                return back()->withErrors(['De gebruiker bestaat niet!']);
            }
            if ($project->contains($user)) {
                return back()->withErrors(['De gebruiker zit al in het project!']);
            }
            ProjectUser::create(array(
                'user_id' => $user->id,
                'project_id' => $id
            ));
            return back()->with('success', 'De gebruiker is toegevoegd aan het project!');
        } else {
            $project->update(array(
                'status_id' => ProjectStatus::find($request->status)->id,
            ));
            return back()->with('success', 'De status van het project is gewijzigd!');
        }
        return back();
    }

    public function rateWork($id)
    {
        $project = Project::find($id);
        if ($project == null) {
            return back();
        }
        if (!$project->isClosed()) {
            return abort(403);
        }
        return view('rate-work', ['project' => $project]);
    }

    public function viewRatings($id) {
        $project = Project::find($id);
        if ($project == null) {
            return back();
        }
        if (!$project->isClosed()) {
            return abort(403);
        }
        return view('view-ratings', ['ratings' => $project->ratings()]);
    }

    public function addRating(Request $request, $id)
    {
        $project = Project::find($id);
        if ($project == null) {
            return back();
        }
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imagePath = time() . '.' . request()->image->getClientOriginalExtension();
        $image = $request->file('image');
        $image->storeAs('images/ratings', $imagePath);
        Rating::create(array(
            'user_id'     =>    Auth::user()->id,
            'project_id'  =>    $project->id,
            'mark'        =>    $request->mark,
            'comments'    =>    $request->comments,
            'image_path'  =>    $imagePath
        ));
        return $this->show($id);
    }


}
