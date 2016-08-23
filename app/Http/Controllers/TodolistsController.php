<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
//use App\Http\Auth;

use App\Todolist;
use App\User;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Auth;
use Session;

class TodolistsController extends Controller
{
    //

    public function index(Request $request, Builder $htmlBuilder)
    {
            
        if ($request->ajax()) {
            
            $todolists = Todolist::with('user')->where('user_id', Auth::user()->id);
            
            return Datatables::of($todolists)->addColumn('action', function($todolist){
                return view('datatable._action', [
                'model' => $todolist,
                'form_url' => route('admin.todolists.destroy', $todolist->id),
                'edit_url' => route('admin.todolists.edit', $todolist->id),
                'completed_url' => route('admin.todolists.completed', $todolist->id),
                'field_completed' => $todolist->completed,
                'confirm_message' => 'Yakin mau menghapus ' . $todolist->name . '?'
                ]);
            })->make(true);
        }
                $html = $htmlBuilder
                ->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Name List'])
                ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'User'])
                ->addColumn(['data' => 'start_date', 'name'=>'start_date', 'title'=>'Tanggal Mulai'])
                ->addColumn(['data' => 'end_date', 'name'=>'end_date', 'title'=>'Tanggal Akhir'])
                ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Action', 'orderable'=>false,'searchable'=>false]);

       $todolists2 = Todolist::all()->where('user_id', Auth::user()->id);
       //dd($todolists2);
        
        
        return view('todolists.index')->with(compact('html'))->with(compact('todolists2'));
    }


    public function create()
    {
        return view('todolists.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            //'user_id' => 'required',
        ]);
        //$user = new User();
        
        $todolist = new Todolist();
        $todolist->user_id = $request->userID;
        $todolist->name = $request->name;
        $todolist->description = $request->description;
        $todolist->start_date = $request->start_date;
        $todolist->end_date = $request->end_date;
        $todolist->completed = 'T';
        $todolist->save();

        //$todolist->save();

        
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $todolist->name"
        ]);
        return redirect()->route('admin.todolists.index');
    }


    public function edit($id)
    {
        $todolist = Todolist::find($id);
        return view('todolists.edit')->with(compact('todolist'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            //'user_id' => 'required',
        ]);
        $todolist = Todolist::find($id);

        $todolist->name = $request->input('name');
        $todolist->description = $request->input('description');
        $todolist->start_date = $request->input('start_date');
        $todolist->end_date = $request->input('end_date');
        $todolist->completed = 'T';
        $todolist->save();
        Session::flash("flash_notification" , [
            "level" => "success" ,
            "message" => "Berhasil merubah $todolist->name"
        ]);
        return redirect()->route('admin.todolists.index');
    }

    public function destroy($id)
    {
        Todolist::destroy($id);
        Session::flash("flash_notification" , [
        "level" => "success" ,
        "message" => "List berhasil dihapus"
        ]);
        return redirect()->route('admin.todolists.index');
    }

    public function completed($id)
    {
        $todolist = Todolist::find($id);
        $todolist->completed = 'Y';
        $todolist->save();
        Session::flash("flash_notification" , [
            "level" => "success" ,
            "message" => "Berhasil menyelesaikan $todolist->name"
        ]);
        return redirect()->route('admin.todolists.index');
    }


    /*public function getCustomFilter()
    {
        return view('datatable.custom-filter');
    }

    public function getCustomFilterData(Request $request)
    {
        $todolists = Todolist::with('user')->where('user_id', Auth::user()->id);

        //dd($request);

        return Datatables::of($todolists)
            ->filter(function ($query) use ($request) {
                if ($request->has('start_date')) {
                    $query->where('start_date', '=', $request->get('start_date'));
                }

                if ($request->has('end_date')) {
                   $query->where('end_date', '=', $request->get('end_date'));
                }
            })->make(true);


             return view('datatable.custom-filter');
    }*/

}
