<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurBrandHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OurBrandHeroSectionController extends Controller
{
    public function index()
    {
        $items = OurBrandHeroSection::latest()->paginate(10);

        return view('admin.layouts.ourbrand.ourbrandherosection.index', compact('items'));
    }

    public function create()
    {
        return view('admin.layouts.ourbrand.ourbrandherosection.form', [
            'item' => new OurBrandHeroSection(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_line_1' => 'nullable|string|max:255',
            'highlight_1' => 'nullable|string|max:255',
            'title_line_2' => 'nullable|string|max:255',
            'highlight_2' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        // ✅ FIXED checkbox
        $data['is_active'] = $request->input('is_active', 0);

        // ✅ File upload
        if ($request->hasFile('background_image')) {
            $data['background_image'] = $request->file('background_image')
                ->store('hero', 'public');
        }

        OurBrandHeroSection::create($data);

        return redirect()
            ->route('ourbrandherosection.index')
            ->with('success', 'Created successfully');
    }

    public function edit($id)
    {
        $item = OurBrandHeroSection::findOrFail($id);

        return view('admin.layouts.ourbrand.ourbrandherosection.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = OurBrandHeroSection::findOrFail($id);

        $data = $request->validate([
            'title_line_1' => 'nullable|string|max:255',
            'highlight_1' => 'nullable|string|max:255',
            'title_line_2' => 'nullable|string|max:255',
            'highlight_2' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        // ✅ FIXED checkbox
        $data['is_active'] = $request->input('is_active', 0);

        // ✅ File upload handling
        if ($request->hasFile('background_image')) {

            // delete old image safely
            if (!empty($item->background_image) && Storage::disk('public')->exists($item->background_image)) {
                Storage::disk('public')->delete($item->background_image);
            }

            $data['background_image'] = $request->file('background_image')
                ->store('hero', 'public');
        }

        $item->update($data);

        return redirect()
            ->route('ourbrandherosection.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $item = OurBrandHeroSection::findOrFail($id);

        if ($item->background_image && Storage::disk('public')->exists($item->background_image)) {
            Storage::disk('public')->delete($item->background_image);
        }

        $item->delete();

        return back()->with('success', 'Deleted successfully');
    }
}