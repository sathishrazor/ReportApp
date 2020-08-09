<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class RTReportController extends Controller
{
    //

    public function index()
    {
        return View("rtreport.index");
    }

    public function create()
    {
        return View("rtreport.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_name' => 'required',
            'owner_address' => 'required',
            'client_name' => 'required',
            'client_address' => 'required',
            'project_name' => 'required',
            'project_address' => 'required',
            'requested_by' => 'required',
            'request_no' => 'required',
        ]);
            dd($request);
    }

    public function show($id)
    {
        return View("rtreport.show");
    }

    public function edit($id)
    {
        return View("rtreport.edit");
    }

    public function update($id)
    {
        return View("rtreport.index");
    }

    public function destroy($id)
    {
        return View("rtreport.index");
    }

}
