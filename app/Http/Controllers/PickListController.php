<?php

namespace App\Http\Controllers;

use App\Client;
use App\Owner;
use App\Project;
use App\Employee;
use App\MPTReport;
use App\Option;
use Yajra\Datatables\Datatables;
use App\PickList;
use App\RecentHistory;
use App\RTReport;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Auth;
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
                    $btn = '<a href="/picklist/'.$row->id.'/edit"  data-toggle="tooltip"   class="edit btn btn-primary btn-sm editItem">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  class="btn btn-danger btn-sm deleteItem">Delete</a>';
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
            $pklist = PickList::where('name', $id)->first()->options()->limit(10)->get();
            return response()->json($pklist);
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

    public function search_global(Request $req)
    {

        $q = $req->q;

        if ($q == '') {
            $res = PickList::where([
                ['name', 'like', '%' . $q . '%']
            ])->limit(10)->get();
            return response()->json($res);
        } else {

            $res1 = PickList::select("name as label")->where([
                ['name', 'like', '%' . $q . '%']]

                )->limit(5)->get();

                foreach($res1 as $r)
                {
                    $r->category = "PickList";
                };

            $res2 = RTReport::
                where([['project_address', 'like', '%' . $q . '%']])
                ->orWhere([['client_address', 'like', '%' . $q . '%']])
                ->orWhere([['owner_address', 'like', '%' . $q . '%']])
                ->limit(5)->get();

                foreach($res2 as $r)
                {
                    $r->label = "RT_NO_{$r->id}";
                    $r->category = "RTReport";
                };

            $res3 = MPTReport::
                 where([['project_address', 'like', '%' . $q . '%']])
                ->orWhere([['client_address', 'like', '%' . $q . '%']])
                ->orWhere([['owner_address', 'like', '%' . $q . '%']])
                ->limit(5)->get();

                foreach($res3 as $r)
                {
                    $r->label = "RT_NO_{$r->id}";
                    $r->category = "MPTReport";
                };


            $res4 = Client::select("name as label")->where([
                ['name', 'like', '%' . $q . '%']
                ])->limit(5)->get();

                foreach($res4 as $r)
                {

                    $r->category = "Client";
                };


                return response()->json([$res1,$res2,$res3,$res4]);

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


    public function store(Request $request)
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
        $record = PickList::findOrFail($id);
        return view('picklist.edit',["record"=>$record]);
    }



    public function update($id,Request $request)
    {

        $task = PickList::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'Options'=>'required'

        ]);

        $input = $request->all();

        $task->update($input);
        $task->options()->delete();
        $task->save();
        foreach( $request->Options as $option)
        {
            //$matchThese = ['id'=>$option["id"]];
            $task->options()->create($option);
        }
        $task->push();
        return  redirect()->action('PickListController@index');
    }

    public function destroy($id)
    {
        $record = PickList::findOrFail($id);
        $record->delete();
        return response()->json(["result"=>"success"]);
    }

    public function record_history(Request $req)
    {

        if(auth()->user())
        {
            $id = auth()->user()->id;
            $count = RecentHistory::where('user_id',$id)->count();
            $deleteUs = RecentHistory::where('user_id',$id) ->orderBy('created_at', 'desc')->take($count)->skip(10)->get();
            foreach($deleteUs as $deleteMe){
                RecentHistory::where('id',$deleteMe->id)->delete();
                    }
            auth()->user()->RecentHistory()->create($req->all());

        }
    }


    public function getaddress(Request $req)
    {
        $module = $req->module;
        $rec = $req->record;
        $result = [];
        switch($module)
        {
            case "owners":
                $result = Owner::where([['id', '=', $rec]])->first();
                if($result)
                 return  response()->json($result->addressbook);
            break;

            case "clients":
                $result = Client::where([['id', '=', $rec]])->first();
                if($result)
                 return  response()->json($result->addressbook);
            break;

            case "employees":
                $result = Employee::where([['id', '=', $rec]])->first();
                if($result)
                 return  response()->json($result->addressbook);
            break;

            case "projects":
                $result = Employee::where([['id', '=', $rec]])->first();
                if($result)
                 return  response()->json($result->addressbook);
            break;
        }
        return response()->json([]);
    }
}
