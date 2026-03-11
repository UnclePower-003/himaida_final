<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('id','asc')->get();

        return view('admin.layouts.homepage.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.layouts.homepage.stats.form', ['stat' => new Stat]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => 'required|string|max:255',  // versatile field
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('stats', 'public');
        }

        Stat::create($data);

        return redirect()->route('stats.index')
            ->with('success', 'Stat created successfully.');
    }

    public function edit(Stat $stat)
    {
        return view('admin.layouts.homepage.stats.form', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $data = $request->validate([
            'value' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('stats', 'public');
        }

        $stat->update($data);

        return redirect()->route('stats.index')
            ->with('success', 'Stat updated successfully.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();

        return redirect()->route('stats.index')
            ->with('success', 'Stat deleted successfully.');
    }
}
