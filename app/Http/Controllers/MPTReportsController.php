<?php

namespace App\Http\Controllers;

use App\MPTReport;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MPTReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return View("mptreports.index");
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = MPTReport::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/mptreport/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
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
        return View("mptreports.create");
    }

    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request, [
            'owner' => 'required',
            'client' => 'required',
            'project' => 'required',
            'requested_by' => 'required',
            'request_no' => 'required',
            "photo_1" =>'required|image',
            "photo_2" =>'required|image',
            "drawing" =>'required|image',
        ]);
       $photo_1 =  request("photo_1")->store("uploads","public");
       $photo_2 =  request("photo_2")->store("uploads","public");
       $drawing =  request("drawing")->store("uploads","public");

        $data =$request->all();

        $report = MPTReport::create($data);
        $report->photo_1 = $photo_1;
        $report->photo_2 = $photo_2;
        $report->drawing = $drawing;

        $report->created_by = auth()->user()->email;
        $report->save();
        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        $report->push();
        return  redirect()->action('MPTReportsController@index');
    }

    public function show($id)
    {
        $record = MPTReport::findOrFail($id);
        return View("mptreports.show",["record"=>$record]);
    }

    public function edit($id)
    {
        $record = MPTReport::findOrFail($id);
        return  view('mptreports.edit',["record"=>$record]);
    }

    public function update($id,Request $request)
    {
        $rec = MPTReport::findOrFail($id);

        $this->validate($request, [
            'owner' => 'required',
            'client' => 'required',
            'project' => 'required',
            'requested_by' => 'required',
            'request_no' => 'required',
        ]);
        $input = $request->all();
        $rec->update($input);

        if($request->hasFile('photo_1'))
        {
           // dd($request);
            $photo_1 =  request("photo_1")->store("uploads","public");
            $rec->photo_1 = $photo_1;
        }
        if($request->hasFile('photo_2'))
        {

            $photo_2 =  request("photo_2")->store("uploads","public");
            $rec->photo_2 = $photo_2;
           // dd($rec->photo_2);
        }
        if($request->hasFile('drawing'))
        {
            $drawing =  request("drawing")->store("uploads","public");
            $rec->drawing = $drawing;
        }

        $rec->save();
        $rec->interpretations()->delete();
        foreach( $request->interpretations as $row)
        {
            $rec->interpretations()->create($row);
        }
        $rec->push();
        return View("mptreports.index");
    }
    public function destroy($id)
    {
        $record = MPTReport::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }

}
