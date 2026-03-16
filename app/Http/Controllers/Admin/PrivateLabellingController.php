<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivateLabelling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrivateLabellingController extends Controller
{

    public function index()
    {
        $data = PrivateLabelling::latest()->get();
        return view('admin.layouts.privatelable.privatelabelling.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layouts.privatelable.privatelabelling.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $image = null;

        if($request->hasFile('image')){
            $image = $request->file('image')->store('privatelabelling','public');
        }

        PrivateLabelling::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'points'=>$request->points,
            'image'=>$image
        ]);

        return redirect()->route('privatelabelling.index');
    }

    public function edit($id)
    {
        $data = PrivateLabelling::findOrFail($id);
        return view('admin.layouts.privatelable.privatelabelling.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = PrivateLabelling::findOrFail($id);

        if($request->hasFile('image')){
            $image = $request->file('image')->store('private-labelling','public');
            $data->image = $image;
        }

        $data->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'points'=>$request->points,
        ]);

        return redirect()->route('privatelabelling.index');
    }

    public function destroy($id)
    {
        PrivateLabelling::destroy($id);
        return back();
    }
}