<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Client;

class ClientsController extends Controller
{
    public function index()
    {
        return View("client.index");
    }

    public function create()
    {
        return View("client.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner_name' => 'required',

        ]);
        $report = Client::create($request);
        $report->save();
        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        $report->push();
        return  redirect()->action('ClientsController@index');
    }

    public function show($id)
    {
        return View("client.show");
    }

    public function edit($id)
    {
        return View("client.edit");
    }

    public function update($id)
    {
        return View("client.index");
    }

    public function destroy($id)
    {
        return View("client.index");
    }
}
