<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcessStep;
use Illuminate\Http\Request;

class ProcessStepController extends Controller
{
    public function index()
    {
        $steps = ProcessStep::all();

        return view('admin.layouts.homepage.process_steps.index', compact('steps'));
    }

    public function create()
    {
        return view('admin.layouts.homepage.process_steps.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg,webp|max:2048',
            'position' => 'required|in:top,bottom',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('process_steps', 'public');
        }

        ProcessStep::create($data);

        return redirect()->route('process_steps.index')
            ->with('success', 'Step created.');
    }

    public function edit(ProcessStep $processStep)
    {
        return view('admin.layouts.homepage.process_steps.form', compact('processStep'));
    }

    public function update(Request $request, ProcessStep $processStep)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg,webp|max:2048',
            'position' => 'required|in:top,bottom',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('process_steps', 'public');
        }

        $processStep->update($data);

        return redirect()->route('process_steps.index')
            ->with('success', 'Step updated.');
    }

    public function destroy(ProcessStep $processStep)
    {
        $processStep->delete();

        return back()->with('success', 'Step deleted.');
    }
}
