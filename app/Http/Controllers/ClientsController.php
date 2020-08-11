<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ClientsController extends Controller
{
    public function index()
    {
        return View("clients.index");
    }

    public function create()
    {
        return View("clients.create");
    }
    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = Client::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="clients/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-danger btn-sm deleteItem">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        //dd($request);
        abort(404);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'entity_id' =>'required|unique:owners',
            'addressbook'=>'required'
        ]);

        $rec = Client::create( $request->all());
        $rec->created_by = auth()->user()->email;
        $rec->save();

        foreach ($request->addressbook as $address) {
            $rec->addressbook()->create($address);
        }
        $rec->push();
        return  redirect()->action('ClientsController@index');
    }

    public function show($id)
    {
        $rec = Client::findOrFail($id);
        return View("clients.show",["record" => $rec]);
    }


    public function edit($id)
    {
        return View("clients.edit");
    }

    public function update($id)
    {
        return View("clients.index");
    }

    public function destroy($id)
    {
        $record = Client::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }


    public function get()
    {

        $pick = Client::select([
            "entity_id as text",
            "name",
            "id as value"
        ])->get();
        return response()->json($pick);
    }

}
