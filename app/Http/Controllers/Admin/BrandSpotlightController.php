<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandSpotlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandSpotlightController extends Controller
{
    public function index()
    {
        $items = BrandSpotlight::latest()->paginate(10);
        return view('admin.layouts.ourbrand.brandspotlight.index', compact('items'));
    }

    public function create()
    {
        return view('admin.layouts.ourbrand.brandspotlight.form', [
            'brand' => new BrandSpotlight(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'title_color'  => 'nullable|string|max:7',
            'description'  => 'required|string',
            'brand_image'  => 'nullable|image|max:2048',
            'circle_image' => 'nullable|image|max:2048',
            'tags'         => 'nullable|array',
            'tags.*'       => 'string|max:50',
            'active'       => 'nullable|boolean',
        ]);

        $data['tags']   = $data['tags'] ?? [];
        $data['active'] = $request->boolean('active');

        if ($request->hasFile('brand_image')) {
            $data['brand_image'] = $request->file('brand_image')
                ->store('brandspotlight', 'public');
        }

        if ($request->hasFile('circle_image')) {
            $data['circle_image'] = $request->file('circle_image')
                ->store('brandspotlight', 'public');
        }

        BrandSpotlight::create($data);

        return redirect()->route('brandspotlight.index')
            ->with('success', 'Brand Spotlight created successfully.');
    }

    // ⚠️ Parameter name MUST match the route wildcard {brandspotlight}
    public function edit(BrandSpotlight $brandspotlight)
    {
        return view('admin.layouts.ourbrand.brandspotlight.form', [
            'brand' => $brandspotlight,
        ]);
    }

    public function update(Request $request, BrandSpotlight $brandspotlight)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'title_color'  => 'nullable|string|max:7',
            'description'  => 'required|string',
            'brand_image'  => 'nullable|image|max:2048',
            'circle_image' => 'nullable|image|max:2048',
            'tags'         => 'nullable|array',
            'tags.*'       => 'string|max:50',
            'active'       => 'nullable|boolean',
        ]);

        $data['tags']   = $data['tags'] ?? [];
        $data['active'] = $request->boolean('active');

        if ($request->hasFile('brand_image')) {
            if ($brandspotlight->brand_image) {
                Storage::disk('public')->delete($brandspotlight->brand_image);
            }
            $data['brand_image'] = $request->file('brand_image')
                ->store('brandspotlight', 'public');
        }

        if ($request->hasFile('circle_image')) {
            if ($brandspotlight->circle_image) {
                Storage::disk('public')->delete($brandspotlight->circle_image);
            }
            $data['circle_image'] = $request->file('circle_image')
                ->store('brandspotlight', 'public');
        }

        $brandspotlight->update($data);

        return redirect()->route('brandspotlight.index')
            ->with('success', 'Brand Spotlight updated successfully.');
    }

    public function destroy(BrandSpotlight $brandspotlight)
    {
        if ($brandspotlight->brand_image) {
            Storage::disk('public')->delete($brandspotlight->brand_image);
        }
        if ($brandspotlight->circle_image) {
            Storage::disk('public')->delete($brandspotlight->circle_image);
        }

        $brandspotlight->delete();

        return redirect()->route('brandspotlight.index')
            ->with('success', 'Brand Spotlight deleted successfully.');
    }
}