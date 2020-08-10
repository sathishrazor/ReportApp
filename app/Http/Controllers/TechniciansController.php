<?php

namespace App\Http\Controllers;

use App\Technician;
use Illuminate\Http\Request;

class TechniciansController extends Controller
{
    public function index()
    {
        return View("technicians.index");
    }

    public function create()
    {
        return View("technicians.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_name' => 'required',

        ]);
        $report = Technician::create($request);
        $report->save();
        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        $report->push();
        return  redirect()->action('TechniciansController@index');
    }

    public function show($id)
    {
        return View("technicians.show");
    }

    public function edit($id)
    {
        return View("technicians.edit");
    }

    public function update($id)
    {
        return View("technicians.index");
    }

    public function destroy($id)
    {
        return View("technicians.index");
    }
}
