<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::orderBy('id', 'asc')->get();

        return view('admin.layouts.homepage.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.layouts.homepage.services.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'is_featured' => 'nullable|boolean',
        ]);

        // Proper boolean handling
        $data['is_featured'] = $request->boolean('is_featured');

        // Ensure only ONE featured service
        if ($data['is_featured']) {
            Services::where('is_featured', true)->update(['is_featured' => false]);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Services::create($data);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Services $service)
    {
        return view('admin.layouts.homepage.services.form', compact('service'));
    }

    public function update(Request $request, Services $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        // Ensure only ONE featured service
        if ($data['is_featured']) {
            Services::where('is_featured', true)
                ->where('id', '!=', $service->id)
                ->update(['is_featured' => false]);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Services $service)
    {
        $service->delete();

        return back()->with('success', 'Service deleted successfully.');
    }
}
