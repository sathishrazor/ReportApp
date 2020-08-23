<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class OwnersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
                    $btn = '<a href="owners/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-danger btn-sm deleteItem">Delete</a>';

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
            'entity_id' =>'required|unique:owners',
            'addressbook'=>'required'
        ]);

        $Owner = Owner::create( $request->all());
        $Owner->created_by = auth()->user()->email;
        $Owner->save();

        foreach ($request->addressbook as $address) {
            $Owner->addressbook()->create($address);
        }


        $Owner->push();

        return  redirect()->action('OwnersController@index');
    }

    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return View("owners.show",["record" => $owner]);
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
        $record = Owner::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }

    public function get()
    {

        $pick = Owner::select([
            "entity_id as text",
            "name",
            "id as value"
        ])->get();
        return response()->json($pick);
    }

}
