<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContractManufacturing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractManufacturingController extends Controller
{
    public function index()
    {
        $contracts = ContractManufacturing::latest()->get();
        return view('admin.layouts.privatelable.contract_manufacturing.index', compact('contracts'));
    }

    public function create()
    {
        return view('admin.layouts.privatelable.contract_manufacturing.form');
    }

    public function edit(ContractManufacturing $contractManufacturing)
    {
        return view('admin.layouts.privatelable.contract_manufacturing.form', compact('contractManufacturing'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'nullable|array',
            'points.*' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('contract_manufacturing', 'public');
        }

        ContractManufacturing::create($data);

        return redirect()->route('contract_manufacturing.index')
            ->with('success','Created Successfully');
    }

    public function update(Request $request, ContractManufacturing $contractManufacturing)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'points' => 'nullable|array',
            'points.*' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if($contractManufacturing->image){
                Storage::disk('public')->delete($contractManufacturing->image);
            }

            $data['image'] = $request->file('image')->store('contract_manufacturing','public');
        }

        $contractManufacturing->update($data);

        return redirect()->route('contract_manufacturing.index')
            ->with('success','Updated Successfully');
    }

    public function destroy(ContractManufacturing $contractManufacturing)
    {
        if($contractManufacturing->image){
            Storage::disk('public')->delete($contractManufacturing->image);
        }

        $contractManufacturing->delete();

        return back()->with('success','Deleted Successfully');
    }
}