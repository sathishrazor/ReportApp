<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class OwnersController extends Controller
{
    public function index()
    {
        return View("owners.index");
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = Owner::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/owners/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //dd($request);
        abort(404);
    }

    public function create()
    {
        return View("owners.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'entity_id' => 'required',
            'address' => 'required'
        ]);

        $Owner = Owner::create( $request->all());
        $Owner->save();

        return  redirect()->action('OwnersController@index');
    }

    public function show($id)
    {
        return View("owners.show");
    }

    public function edit($id)
    {
        return View("owners.edit");
    }

    public function update($id)
    {
        return View("owners.index");
    }

    public function destroy($id)
    {
        return View("owners.index");
    }

}
