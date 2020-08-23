<?php

namespace App\Http\Controllers;

use App\UTAReport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UTAReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return View("utareports.index");
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = UTAReport::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<div class="btn btn-group"><a href="/utareport/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteItem">Delete</a></div>';
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
        return View("utareports.create");
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

        $report = UTAReport::create($data);
        $report->photo_1 = $photo_1;
        $report->photo_2 = $photo_2;
        $report->drawing = $drawing;

        $report->created_by = auth()->user()->email;

        $report->save();

        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        foreach ($request->calibrations as $int) {
            $report->calibrations()->create($int);
        }

        $report->push();
        return  redirect()->action('UTAReportController@index');
    }

    public function show($id)
    {
        $record = UTAReport::findOrFail($id);

        return View("utareports.show",["record"=>$record]);
    }
    public function edit($id)
    {
        $record = UTAReport::findOrFail($id);
        return  view('utareports.edit',["record"=>$record]);
    }

    public function update($id,Request $request)
    {

        $rec = UTAReport::findOrFail($id);

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

        $rec->calibrations()->delete();
        foreach( $request->calibrations as $row)
        {
            $rec->calibrations()->create($row);
        }

        $rec->push();
        return View("utareports.index");
    }

    public function destroy($id)
    {
        $record = UTAReport::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }
}
