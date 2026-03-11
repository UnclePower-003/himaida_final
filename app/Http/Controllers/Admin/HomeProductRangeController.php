<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeProductRange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeProductRangeController extends Controller
{
    public function index()
    {
        $products = HomeProductRange::all();
        return view('admin.layouts.homepage.homeproductrange.index', compact('products'));
    }

    public function create()
    {
        return view('admin.layouts.homepage.homeproductrange.form', ['product' => new HomeProductRange()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_products', 'public');
        }

        HomeProductRange::create($data);

        return redirect()->route('homeproductrange.index')
            ->with('success', 'Product added successfully.');
    }

    public function edit(HomeProductRange $homeproductrange)
    {
        return view('admin.layouts.homepage.homeproductrange.form', [
            'product' => $homeproductrange
        ]);
    }

    public function update(Request $request, HomeProductRange $homeproductrange)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($homeproductrange->image) {
                Storage::disk('public')->delete($homeproductrange->image);
            }
            $data['image'] = $request->file('image')->store('home_products', 'public');
        }

        $homeproductrange->update($data);

        return redirect()->route('homeproductrange.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(HomeProductRange $homeproductrange)
    {
        if ($homeproductrange->image) {
            Storage::disk('public')->delete($homeproductrange->image);
        }

        $homeproductrange->delete();

        return redirect()->route('homeproductrange.index')
            ->with('success', 'Product deleted.');
    }
}