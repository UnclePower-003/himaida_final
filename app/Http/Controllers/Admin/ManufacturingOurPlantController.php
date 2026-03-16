<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManufacturingOurPlant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManufacturingOurPlantController extends Controller
{
    public function index()
    {
        $plants = ManufacturingOurPlant::latest()->get();
        return view('admin.layouts.manufacturing.manufacturingOurPlant.index', compact('plants'));
    }

    public function create()
    {
        return view('admin.layouts.manufacturing.manufacturingOurPlant.form');
    }

    public function edit(ManufacturingOurPlant $manufacturingOurPlant)
    {
        return view('admin.layouts.manufacturing.manufacturingOurPlant.form', compact('manufacturingOurPlant'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'descriptions' => 'nullable|array',
            'descriptions.*' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('manufacturing_plant','public');
        }

        ManufacturingOurPlant::create($data);

        return redirect()->route('manufacturingOurPlant.index')
            ->with('success','Plant section created');
    }

    public function update(Request $request, ManufacturingOurPlant $manufacturingOurPlant)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'descriptions' => 'nullable|array',
            'descriptions.*' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if($manufacturingOurPlant->image){
                Storage::disk('public')->delete($manufacturingOurPlant->image);
            }
            $data['image'] = $request->file('image')->store('manufacturing_plant','public');
        }

        $manufacturingOurPlant->update($data);

        return redirect()->route('manufacturingOurPlant.index')
            ->with('success','Plant section updated');
    }

    public function destroy(ManufacturingOurPlant $manufacturingOurPlant)
    {
        if($manufacturingOurPlant->image){
            Storage::disk('public')->delete($manufacturingOurPlant->image);
        }

        $manufacturingOurPlant->delete();

        return back()->with('success','Deleted');
    }
}