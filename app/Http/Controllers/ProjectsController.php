<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return View("projects.index");
    }

    public function create()
    {
        return View("projects.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_name' => 'required',

        ]);
        $report = Project::create($request);
        $report->save();
        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        $report->push();
        return  redirect()->action('ProjectsController@index');
    }

    public function show($id)
    {
        return View("projects.show");
    }

    public function edit($id)
    {
        return View("projects.edit");
    }

    public function update($id)
    {
        return View("projects.index");
    }

    public function destroy($id)
    {
        return View("projects.index");
    }
}
