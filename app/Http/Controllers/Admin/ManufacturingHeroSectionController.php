<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ManufacturingHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManufacturingHeroSectionController extends Controller
{
    public function index()
    {
        $items = ManufacturingHeroSection::latest()->get();
        return view('admin.layouts.manufacturing.manufacturingherosection.index', compact('items'));
    }

    public function create()
    {
        return view('admin.layouts.manufacturing.manufacturingherosection.form');
    }

    public function edit(ManufacturingHeroSection $manufacturingherosection)
    {
        return view('admin.layouts.manufacturing.manufacturingherosection.form', compact('manufacturingherosection'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('manufacturing_hero','public');
        }

        ManufacturingHeroSection::create($data);

        return redirect()->route('manufacturingherosection.index')
            ->with('success','Hero section created');
    }

    public function update(Request $request, ManufacturingHeroSection $manufacturingherosection)
    {
        $data = $request->validate([
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {

            if($manufacturingherosection->image){
                Storage::disk('public')->delete($manufacturingherosection->image);
            }

            $data['image'] = $request->file('image')->store('manufacturing_hero','public');
        }

        $manufacturingherosection->update($data);

        return redirect()->route('manufacturingherosection.index')
            ->with('success','Hero updated');
    }

    public function destroy(ManufacturingHeroSection $manufacturingherosection)
    {
        if($manufacturingherosection->image){
            Storage::disk('public')->delete($manufacturingherosection->image);
        }

        $manufacturingherosection->delete();

        return back()->with('success','Deleted');
    }
}