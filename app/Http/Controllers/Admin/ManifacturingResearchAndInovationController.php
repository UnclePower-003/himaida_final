<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManifacturingResearchAndInovation;
use Illuminate\Http\Request;

class ManifacturingResearchAndInovationController extends Controller
{
    public function index()
    {
        $data = ManifacturingResearchAndInovation::first();
        return view('admin.layouts.manufacturing.manifacturing_research.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layouts.manufacturing.manifacturing_research.form');
    }

    public function store(Request $request)
    {
        $data = new ManifacturingResearchAndInovation();

        if ($request->hasFile('image')) {
            $data->image = $request->file('image')->store('research', 'public');
        }

        // Clean empty values
        $descriptions = array_values(array_filter($request->descriptions));

        $data->title = $request->title;
        $data->descriptions = $descriptions;

        $data->save();

        return redirect()->route('manifacturing_research.index')
            ->with('success', 'Saved successfully');
    }

    public function edit($id)
    {
        $data = ManifacturingResearchAndInovation::findOrFail($id);
        return view('admin.layouts.manufacturing.manifacturing_research.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = ManifacturingResearchAndInovation::findOrFail($id);

        if ($request->hasFile('image')) {
            $data->image = $request->file('image')->store('research', 'public');
        }

        $descriptions = array_values(array_filter($request->descriptions));

        $data->update([
            'title' => $request->title,
            'descriptions' => $descriptions
        ]);

        return redirect()->route('manifacturing_research.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        ManifacturingResearchAndInovation::findOrFail($id)->delete();

        return back()->with('success', 'Deleted');
    }
}