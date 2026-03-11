<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Corevalue;

class CorevalueController extends Controller
{

    public function index()
    {
        $data = Corevalue::latest()->get();
        return view('admin.layouts.aboutuspage.corevalues.index', compact('data'));
    }


    public function create()
    {
        return view('admin.layouts.aboutuspage.corevalues.form');
    }


    public function store(Request $request)
    {

        $data = new Corevalue();

        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/corevalues'),$name);
            $data->icon = $name;
        }

        $data->title = $request->title;

        $data->save();

        return redirect()->route('corevalues.index')
            ->with('success','Core Value Created');
    }



    public function edit($id)
    {
        $data = Corevalue::findOrFail($id);
        return view('admin.layouts.aboutuspage.corevalues.form',compact('data'));
    }



    public function update(Request $request,$id)
    {

        $data = Corevalue::findOrFail($id);

        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/corevalues'),$name);
            $data->icon = $name;
        }

        $data->title = $request->title;

        $data->save();

        return redirect()->route('corevalues.index')
            ->with('success','Core Value Updated');
    }



    public function destroy($id)
    {
        Corevalue::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success','Deleted Successfully');
    }

}