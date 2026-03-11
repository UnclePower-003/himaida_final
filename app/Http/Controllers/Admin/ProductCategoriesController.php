<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use Illuminate\Http\Request;

class ProductCategoriesController extends Controller
{
    // INDEX
    public function index()
    {
        $categories = ProductCategories::latest()->get();

        return view('admin.layouts.homepage.productcategories.index', compact('categories'));
    }

    // CREATE
    public function create()
    {
        return view('admin.layouts.homepage.productcategories.form');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image',
            'bg_color' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('productcategories', 'public');
        }

        ProductCategories::create($data);

        return redirect()->route('productcategories.index')
            ->with('success', 'Category added successfully.');
    }

    // EDIT
    public function edit(ProductCategories $productcategory)
    {
        return view('admin.layouts.homepage.productcategories.form', compact('productcategory'));
    }

    // UPDATE
    public function update(Request $request, ProductCategories $productcategory)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image',
            'bg_color' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('productcategories', 'public');
        }

        $productcategory->update($data);

        return redirect()->route('productcategories.index')
            ->with('success', 'Category updated successfully.');
    }

    // DELETE
    public function destroy(ProductCategories $productcategory)
    {
        $productcategory->delete();

        return back()->with('success', 'Category deleted.');
    }
}
