<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUsHero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactUsHeroController extends Controller
{
    public function index()
    {
        $heroes = ContactUsHero::latest()->paginate(10);

        return view('admin.layouts.contactus.herosection.index', compact('heroes'));
    }

    public function create()
    {
        return view('admin.layouts.contactus.herosection.form', [
            'hero' => new ContactUsHero()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);

        $validated['is_active'] = $request->has('is_active');

        // Only one active hero
        if ($validated['is_active']) {
            ContactUsHero::where('is_active', true)->update(['is_active' => false]);
        }

        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')
                ->store('heroes', 'public');
        }

        ContactUsHero::create($validated);

        return redirect()->route('contactushero.index')
            ->with('success', 'Hero created successfully.');
    }

    // Route model binding: parameter name must match resource route
    public function edit(ContactUsHero $contactushero)
    {
        return view('admin.layouts.contactus.herosection.form', [
            'hero' => $contactushero
        ]);
    }

    public function update(Request $request, ContactUsHero $contactushero)
    {
        $validated = $this->validateRequest($request);

        $validated['is_active'] = $request->has('is_active');

        // Only one active hero
        if ($validated['is_active']) {
            ContactUsHero::where('is_active', true)
                ->where('id', '!=', $contactushero->id)
                ->update(['is_active' => false]);
        }

        if ($request->hasFile('background_image')) {
            if ($contactushero->background_image &&
                Storage::disk('public')->exists($contactushero->background_image)) {
                Storage::disk('public')->delete($contactushero->background_image);
            }

            $validated['background_image'] = $request->file('background_image')
                ->store('heroes', 'public');
        }

        $contactushero->update($validated);

        return redirect()->route('contactushero.index')
            ->with('success', 'Hero updated successfully.');
    }

    public function destroy(ContactUsHero $contactushero)
    {
        if ($contactushero->background_image &&
            Storage::disk('public')->exists($contactushero->background_image)) {
            Storage::disk('public')->delete($contactushero->background_image);
        }

        $contactushero->delete();

        return redirect()->route('contactushero.index')
            ->with('success', 'Hero deleted successfully.');
    }

    private function validateRequest(Request $request): array
    {
        return $request->validate([
            'title_line1' => 'required|string|max:255',
            'title_highlight' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);
    }
}