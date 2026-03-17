<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManufacturingHighlight;
use Illuminate\Http\Request;

class ManufacturingHighlightController extends Controller
{
    public function index()
    {
        $highlights = ManufacturingHighlight::orderBy('order')->get();
        return view('admin.layouts.manufacturing.manufacturing_highlights.index', compact('highlights'));
    }

    public function create()
    {
        return view('admin.layouts.manufacturing.manufacturing_highlights.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'column' => 'required|in:left,right',
        ]);

        ManufacturingHighlight::create($request->all());

        return redirect()->route('manufacturing_highlights.index')
            ->with('success', 'Created successfully');
    }

    public function edit($id)
    {
        $highlight = ManufacturingHighlight::findOrFail($id);
        return view('admin.layouts.manufacturing.manufacturing_highlights.form', compact('highlight'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'column' => 'required|in:left,right',
        ]);

        $highlight = ManufacturingHighlight::findOrFail($id);
        $highlight->update($request->all());

        return redirect()->route('manufacturing_highlights.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        ManufacturingHighlight::findOrFail($id)->delete();

        return back()->with('success', 'Deleted successfully');
    }
}