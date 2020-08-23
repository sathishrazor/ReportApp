<?php

namespace App\Http\Controllers;

use App\RTReport;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RTReportController extends Controller
{
    //

    public function index()
    {
        return View("rtreport.index");
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = RTReport::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/rtreport/'.$row->id.'/edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';
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
        return View("rtreport.create");
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
        ]);
        $data =$request->all();
        $report = RTReport::create($data);

        $report->createdby = auth()->user()->email;
        $report->save();
        foreach ($request->interpretations as $int) {
            $report->interpretations()->create($int);
        }

        $report->push();
        return  redirect()->action('RTReportController@index');
    }

    public function show($id)
    {
        $record = RTReport::findOrFail($id);

        return View("rtreport.show",["record"=>$record]);
    }

    public function edit($id)
    {
        $record = RTReport::findOrFail($id);
        return  view('rtreport.edit',["record"=>$record]);
    }

    public function update($id,Request $request)
    {
        $rec = RTReport::findOrFail($id);

        $this->validate($request, [
            'owner' => 'required',
            'client' => 'required',
            'project' => 'required',
            'requested_by' => 'required',
            'request_no' => 'required',
        ]);

        $input = $request->all();

        $rec->update($input);
        $rec->interpretations()->delete();
        $rec->save();
        foreach( $request->interpretations as $row)
        {
            $rec->interpretations()->create($row);
        }
        $rec->push();
        return View("rtreport.index");
    }
    public function destroy($id)
    {
        $record = RTReport::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }

}
