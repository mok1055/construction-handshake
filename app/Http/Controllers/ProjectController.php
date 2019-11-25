<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

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
        return $request->all();
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
