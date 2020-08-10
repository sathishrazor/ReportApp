<?php

namespace App\Http\Controllers;

use App\Option;
use Yajra\Datatables\Datatables;
use App\PickList;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PickListController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('picklist.index');
    }

    public function get($id)
    {

        $pick = PickList::where('name', $id)->first();
        if(!$pick)
            return response()->json([]);
        else
        return response()->json($pick->options);
    }

    public function loadData(Request $request)
    {

        if ($request->ajax()) {
            $data = PickList::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('picklist.index');
    }


    public function search(Request $req)
    {
        $id = $req->id;
        $q = $req->q;

        if ($q == '') {
            $pklist = PickList::where('name', $id)->first()->options::orderby('text', 'asc')->limit(5)->get();
        } else {
            $pklist =PickList::where('name', $id)->first();
            if(!$pklist)
            return response()->json([]);
            else
            {
             $res = $pklist->options()->select('text', 'value')
                ->where([
                    ['text', 'like', '%' . $q . '%']
                ])->limit(5)->get();
                return response()->json($res);
            }
        }
    }


    public function Details($req)
    {
        $pklist = PickList::find($req);
        dd($pklist);
        return view('picklist.details');
    }


    public function create()
    {
        return view('picklist.create');
    }


    public function create_confirm(Request $request)
    {

        $pklist = new PickList();
        $pklist->name =  $request->name;
        $pklist->description =  $request->name;

        $pklist->save();
        foreach ($request->Options as $option) {
            $pklist->options()->create($option);
        }

        $pklist->push();
        return  redirect()->action('PickListController@index');
    }

    public function edit($id)
    {
        return view('picklist.edit');
    }

    public function edit_confirm(Request $request)
    {
        return  redirect()->action('${App\Http\Controllers\HomeController@index}');
    }

    public function delete($id)
    {
        return view('picklist.delete');
    }

    public function delete_confirm(Request $request)
    {
        return  redirect()->action('${App\Http\Controllers\HomeController@index}');
    }
}
