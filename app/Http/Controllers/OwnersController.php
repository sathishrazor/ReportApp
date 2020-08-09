<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    public function index()
    {
        return View("owners.index");
    }

    public function create()
    {
        return View("owners.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_name' => 'required',

        ]);
        $report = Owner::create($request);
        $report->save();
        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        $report->push();
        return  redirect()->action('OwnersController@index');
    }

    public function show($id)
    {
        return View("owner.show");
    }

    public function edit($id)
    {
        return View("owner.edit");
    }

    public function update($id)
    {
        return View("owner.index");
    }

    public function destroy($id)
    {
        return View("owner.index");
    }

}
