<?php

namespace App\Http\Controllers;

use App\Technician;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index()
    {
        return View("employees.index");
    }

    public function create()
    {
        return View("employees.create");
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
        return View("employees.show");
    }

    public function edit($id)
    {
        return View("employees.edit");
    }

    public function update($id)
    {
        return View("employees.index");
    }

    public function destroy($id)
    {
        return View("employees.index");
    }
}
