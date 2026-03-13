<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Manufacturing;

class ManufacturingController extends Controller
{

    public function index()
    {
        $manufacturings = Manufacturing::latest()->get();
        return view('admin.layouts.aboutuspage.manufacturing.index', compact('manufacturings'));
    }

    public function create()
    {
        $manufacturing = new Manufacturing();
        return view('admin.layouts.aboutuspage.manufacturing.form', compact('manufacturing'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'top_text' => 'nullable',
            'bottom_text' => 'nullable',
            'description_one' => 'nullable',
            'description_two' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('manufacturing', 'public');
        }

        Manufacturing::create($data);

        return redirect()->route('manufacturing.index')->with('success','Created successfully');
    }

    public function edit($id)
    {
        $manufacturing = Manufacturing::findOrFail($id);
        return view('admin.layouts.aboutuspage.manufacturing.form', compact('manufacturing'));
    }

    public function update(Request $request, $id)
    {
        $manufacturing = Manufacturing::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'top_text' => 'nullable',
            'bottom_text' => 'nullable',
            'description_one' => 'nullable',
            'description_two' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('manufacturing', 'public');
        }

        $manufacturing->update($data);

        return redirect()->route('manufacturing.index')->with('success','Updated successfully');
    }

    public function destroy($id)
    {
        Manufacturing::findOrFail($id)->delete();
        return back()->with('success','Deleted successfully');
    }
}