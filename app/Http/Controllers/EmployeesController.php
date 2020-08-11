<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmployeesController extends Controller
{
    public function index()
    {
        return View("employees.index");
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = Employee::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="employees/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
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
        return View("employees.create");
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'entity_id' =>'required|unique:owners',
            'addressbook'=>'required'
        ]);

        $rec = Employee::create( $request->all());
        $rec->created_by = auth()->user()->email;
        $rec->save();

        foreach ($request->addressbook as $address) {
            $rec->addressbook()->create($address);
        }
        $rec->push();
        return  redirect()->action('EmployeesController@index');
    }

    public function show($id)
    {

        $owner = Employee::findOrFail($id);
        return View("employees.show",["record" => $owner]);

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
        $record = Employee::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }

    public function get()
    {

        $pick = Employee::select([
            "entity_id as text",
            "name",
            "id as value"
        ])->get();
        return response()->json($pick);
    }
}
