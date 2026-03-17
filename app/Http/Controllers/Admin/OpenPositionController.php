<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpenPosition;
use Illuminate\Http\Request;

class OpenPositionController extends Controller
{
    public function index()
    {
        $positions = OpenPosition::latest()->paginate(10);

        return view('admin.layouts.career.openpositions.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.layouts.career.openpositions.form', [
            'position' => new OpenPosition,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'department' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|string',
            'apply_link' => 'nullable|url',
        ]);

        OpenPosition::create([
            'title' => $request->title,
            'description' => $request->description,
            'apply_link' => $request->apply_link,
            'meta' => [
                'department' => $request->department,
                'location' => $request->location,
                'job_type' => $request->job_type,
            ],
        ]);

        return redirect()->route('openpositions.index')
            ->with('success', 'Position created successfully');
    }

    public function edit(OpenPosition $open_position)
    {
        return view('admin.layouts.career.openpositions.form', [
            'position' => $open_position,
        ]);
    }

    public function update(Request $request, OpenPosition $open_position)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'department' => 'required|string',
            'location' => 'required|string',
            'job_type' => 'required|string',
            'apply_link' => 'nullable|url',
        ]);

        $open_position->update([
            'title' => $request->title,
            'description' => $request->description,
            'apply_link' => $request->apply_link,
            'meta' => [
                'department' => $request->department,
                'location' => $request->location,
                'job_type' => $request->job_type,
            ],
        ]);

        return redirect()->route('openpositions.index')
            ->with('success', 'Position updated successfully');
    }

    public function destroy(OpenPosition $open_position)
    {
        $open_position->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
