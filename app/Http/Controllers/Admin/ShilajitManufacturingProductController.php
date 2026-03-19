<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShilajitManufacturingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShilajitManufacturingProductController extends Controller
{
    public function index()
    {
        $products = ShilajitManufacturingProduct::ordered()->paginate(10);
        return view('admin.layouts.productrange.shilajitmanufacturing.shilajit_products.index', compact('products'));
    }

    public function create()
    {
        $product = new ShilajitManufacturingProduct();
        return view('admin.layouts.productrange.shilajitmanufacturing.shilajit_products.form', compact('product'));
    }

    public function store(Request $request)
    {
        $data = $this->validateProduct($request);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shilajit-products', 'public');
        }

        ShilajitManufacturingProduct::create($data);

        return redirect()
            ->route('shilajit_products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(ShilajitManufacturingProduct $shilajitProduct)
    {
        $product = $shilajitProduct;
        return view('admin.layouts.productrange.shilajitmanufacturing.shilajit_products.form', compact('product'));
    }

    public function update(Request $request, ShilajitManufacturingProduct $shilajitProduct)
    {
        $data = $this->validateProduct($request, $shilajitProduct->id);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($shilajitProduct->image);
            $data['image'] = $request->file('image')->store('shilajit-products', 'public');
        } else {
            unset($data['image']);
        }

        $shilajitProduct->update($data);

        return redirect()
            ->route('shilajit_products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(ShilajitManufacturingProduct $shilajitProduct)
    {
        Storage::disk('public')->delete($shilajitProduct->image);
        $shilajitProduct->delete();

        return redirect()
            ->route('shilajit_products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function validateProduct(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name'           => 'required|string|max:255',
            'subtitle'       => 'nullable|string|max:255',
            'description'    => 'required|string',
            'image'          => ($ignoreId ? 'nullable' : 'required') . '|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image_alt'      => 'nullable|string|max:255',
            'image_position' => 'required|in:left,right',
            'is_active'      => 'boolean',
        ]);
    }
}