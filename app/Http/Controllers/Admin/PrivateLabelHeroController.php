<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivateLabelHero;
use Illuminate\Http\Request;

class PrivateLabelHeroController extends Controller
{
    public function index()
    {
        $heroes = PrivateLabelHero::latest()->get();
        return view('admin.layouts.privatelable.herosection.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.layouts.privatelable.herosection.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'highlight_text' => 'nullable',
            'subtitle' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('privatelablehero', 'public');
        }

        PrivateLabelHero::create($data);

        return redirect()->route('privatelablehero.index')
            ->with('success', 'Hero created successfully');
    }

    public function edit($id)
    {
        $hero = PrivateLabelHero::findOrFail($id);
        return view('admin.layouts.privatelable.herosection.form', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $hero = PrivateLabelHero::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'highlight_text' => 'nullable',
            'subtitle' => 'nullable',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('privatelablehero', 'public');
        }

        $hero->update($data);

        return redirect()->route('privatelablehero.index')
            ->with('success', 'Hero updated successfully');
    }

    public function destroy($id)
    {
        PrivateLabelHero::destroy($id);

        return back()->with('success', 'Hero deleted successfully');
    }
}