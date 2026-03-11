<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormulationController extends Controller
{
    public function index()
    {
        $formulations = Formulation::latest()->get();
        return view('admin.layouts.homepage.formulations.index', compact('formulations'));
    }

    public function create()
    {
        return view('admin.layouts.homepage.formulations.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'required|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'position' => 'required|in:left,right,center',
        ]);

        // center validation
        if ($request->position == 'center') {
            $existingCenter = Formulation::where('position', 'center')->first();
            if ($existingCenter) {
                return back()->withErrors(['position' => 'Only one center item is allowed.'])->withInput();
            }
        }

        $iconPath = $request->file('icon')->store('formulations', 'public');

        Formulation::create([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $iconPath,
            'position' => $request->position,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('formulations.index')->with('success', 'Formulation created successfully.');
    }

    public function edit(Formulation $formulation)
    {
        return view('admin.layouts.homepage.formulations.form', compact('formulation'));
    }

    public function update(Request $request, Formulation $formulation)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg,webp|max:2048',
            'position' => 'required|in:left,right,center',
        ]);

        // center validation
        if ($request->position == 'center') {
            $existingCenter = Formulation::where('position', 'center')
                ->where('id', '!=', $formulation->id)
                ->first();
            if ($existingCenter) {
                return back()->withErrors(['position' => 'Only one center item is allowed.'])->withInput();
            }
        }

        if ($request->hasFile('icon')) {
            if ($formulation->icon) {
                Storage::disk('public')->delete($formulation->icon);
            }
            $iconPath = $request->file('icon')->store('formulations', 'public');
        } else {
            $iconPath = $formulation->icon;
        }

        $formulation->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $iconPath,
            'position' => $request->position,
            'status' => $request->status ?? 0,
        ]);

        return redirect()->route('formulations.index')->with('success', 'Formulation updated successfully.');
    }

    public function destroy(Formulation $formulation)
    {
        if ($formulation->icon) {
            Storage::disk('public')->delete($formulation->icon);
        }
        $formulation->delete();

        return back()->with('success', 'Formulation deleted successfully.');
    }
}