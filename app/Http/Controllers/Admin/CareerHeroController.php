<?php

// app/Http/Controllers/Admin/CareerHeroController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerHero;
use Illuminate\Http\Request;

class CareerHeroController extends Controller
{
    public function index()
    {
        $heroes = CareerHero::latest()->get();
        return view('admin.layouts.career.careerhero.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.layouts.career.careerhero.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('careerhero', 'public');
        }

        CareerHero::create($data);

        return redirect()->route('careerhero.index')->with('success', 'Created successfully');
    }

    public function edit($id)
    {
        $hero = CareerHero::findOrFail($id);
        return view('admin.layouts.career.careerhero.form', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $hero = CareerHero::findOrFail($id);

        $data = $request->validate([
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('careerhero', 'public');
        }

        $hero->update($data);

        return redirect()->route('careerhero.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        CareerHero::findOrFail($id)->delete();
        return back()->with('success', 'Deleted successfully');
    }
}