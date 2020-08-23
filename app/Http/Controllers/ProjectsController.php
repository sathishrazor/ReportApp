<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return View("projects.index");
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = Project::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="projects/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
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
        return View("projects.create");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'entity_id' =>'required|unique:owners',
            'addressbook'=>'required'
        ]);

        $rec = Project::create( $request->all());
        $rec->created_by = auth()->user()->email;
        $rec->save();

        foreach ($request->addressbook as $address) {
            $rec->addressbook()->create($address);
        }
        $rec->push();
        return  redirect()->action('ProjectsController@index');
    }

    public function show($id)
    {
        $rec = Project::findOrFail($id);
        return View("projects.show",["record" => $rec]);
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
        $record = Project::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }


    public function get()
    {

        $pick = Project::select([
            "entity_id as text",
            "name",
            "id as value"
        ])->get();
        return response()->json($pick);
    }

}
