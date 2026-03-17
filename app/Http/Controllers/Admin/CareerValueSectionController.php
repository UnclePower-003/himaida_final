<?php

// app/Http/Controllers/Admin/CareerValueSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerValueSection;
use Illuminate\Http\Request;

class CareerValueSectionController extends Controller
{
    public function index()
    {
        $values = CareerValueSection::latest()->get();
        return view('admin.layouts.career.careervalue.index', compact('values'));
    }

    public function create()
    {
        return view('admin.layouts.career.careervalue.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('careervalue', 'public');
        }

        CareerValueSection::create($data);

        return redirect()->route('careervalue.index')->with('success', 'Value added successfully');
    }

    public function edit($id)
    {
        $value = CareerValueSection::findOrFail($id);
        return view('admin.layouts.career.careervalue.form', compact('value'));
    }

    public function update(Request $request, $id)
    {
        $value = CareerValueSection::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('careervalue', 'public');
        }

        $value->update($data);

        return redirect()->route('careervalue.index')->with('success', 'Value updated successfully');
    }

    public function destroy($id)
    {
        CareerValueSection::findOrFail($id)->delete();
        return back()->with('success', 'Value deleted successfully');
    }
}