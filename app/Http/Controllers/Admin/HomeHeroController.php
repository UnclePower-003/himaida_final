<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeHeroController extends Controller
{
    public function index()
    {
        $homehero = HomeHero::latest()->get();
        return view('admin.layouts.homepage.homehero.index', compact('homehero'));
    }

    public function create()
    {
        return view('admin.layouts.homepage.homehero.form', ['homehero' => new HomeHero()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_hero', 'public');
        }

        HomeHero::create($data);

        return redirect()->route('homehero.index')->with('success', 'Hero created successfully.');
    }

    public function edit(HomeHero $homehero)
    {
        return view('admin.layouts.homepage.homehero.form', compact('homehero'));
    }

    public function update(Request $request, HomeHero $homehero)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($homehero->image) {
                Storage::disk('public')->delete($homehero->image);
            }
            $data['image'] = $request->file('image')->store('home_hero', 'public');
        }

        $homehero->update($data);

        return redirect()->route('homehero.index')->with('success', 'Hero updated successfully.');
    }

    public function destroy(HomeHero $homehero)
    {
        if ($homehero->image) {
            Storage::disk('public')->delete($homehero->image);
        }
        $homehero->delete();

        return redirect()->route('homehero.index')->with('success', 'Hero deleted successfully.');
    }
}