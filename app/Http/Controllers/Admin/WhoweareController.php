<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Whoweare;
use Illuminate\Http\Request;

class WhoweareController extends Controller
{
    public function index()
    {
        $data = Whoweare::latest()->get();

        return view('admin.layouts.aboutuspage.whoweare.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layouts.aboutuspage.whoweare.form');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/whoweare'), $name);
            $data['image1'] = $name;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/whoweare'), $name);
            $data['image2'] = $name;
        }

        Whoweare::create($data);

        return redirect()->route('whoweare.index');
    }

    public function edit($id)
    {
        $data = Whoweare::findOrFail($id);

        return view('admin.layouts.aboutuspage.whoweare.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Whoweare::findOrFail($id);

        $update = $request->all();

        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/whoweare'), $name);
            $update['image1'] = $name;
        }

        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/whoweare'), $name);
            $update['image2'] = $name;
        }

        $data->update($update);

        return redirect()->route('whoweare.index');
    }

    public function destroy($id)
    {
        Whoweare::findOrFail($id)->delete();

        return back();
    }
}
