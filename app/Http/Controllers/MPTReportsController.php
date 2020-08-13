<?php

namespace App\Http\Controllers;

use App\MPTReport;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MPTReportsController extends Controller
{
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
                    $btn = '<a href="/rtreport/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
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
        return View("mptreports.edit");
    }

    public function update($id)
    {
        return View("mptreports.index");
    }
    public function destroy($id)
    {
        $record = MPTReport::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }

}
