<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDesc;
use Illuminate\Http\Request;

class ProductDescController extends Controller
{
    // INDEX
    public function index()
    {
        $descs = ProductDesc::latest()->get();

        return view('admin.layouts.homepage.productdesc.index', [
            'descs' => $descs,
        ]);
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.layouts.homepage.productdesc.form');
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'paragraph' => 'required|string',
        ]);

        ProductDesc::create($validated);

        return redirect()
            ->route('productdesc.index')
            ->with('success', 'Paragraph added successfully.');
    }

    // EDIT FORM
    public function edit(ProductDesc $productdesc)
    {
        return view('admin.layouts.homepage.productdesc.form', [
            'productdesc' => $productdesc,
        ]);
    }

    // UPDATE
    public function update(Request $request, ProductDesc $productdesc)
    {
        $validated = $request->validate([
            'paragraph' => 'required|string',
        ]);

        $productdesc->update($validated);

        return redirect()
            ->route('productdesc.index')
            ->with('success', 'Paragraph updated successfully.');
    }

    // DELETE
    public function destroy(ProductDesc $productdesc)
    {
        $productdesc->delete();

        return redirect()
            ->route('productdesc.index')
            ->with('success', 'Paragraph deleted successfully.');
    }
}
