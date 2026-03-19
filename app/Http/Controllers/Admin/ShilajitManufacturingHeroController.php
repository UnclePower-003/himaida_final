<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShilajitManufacturingHero;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ShilajitManufacturingHeroController extends Controller
{
    public function index(): View
    {
        $heroes = ShilajitManufacturingHero::latest()->paginate(10);

        return view('admin.layouts.productrange.shilajitmanufacturing.shilajitmanufacturinghero.index', compact('heroes'));
    }

    public function create(): View
    {
        $hero = new ShilajitManufacturingHero();

        return view('admin.layouts.productrange.shilajitmanufacturing.shilajitmanufacturinghero.form', compact('hero'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateRequest($request);
        $validated = array_merge($validated, $this->handleUploads($request));

        ShilajitManufacturingHero::create($validated);

        return redirect()
            ->route('shilajit-manufacturing-hero.index')
            ->with('success', 'Hero section created successfully.');
    }

    public function edit(ShilajitManufacturingHero $shilajitManufacturingHero): View
    {
        $hero = $shilajitManufacturingHero;

        return view('admin.layouts.productrange.shilajitmanufacturing.shilajitmanufacturinghero.form', compact('hero'));
    }

    public function update(Request $request, ShilajitManufacturingHero $shilajitManufacturingHero): RedirectResponse
    {
        $validated = $this->validateRequest($request, $shilajitManufacturingHero->id);
        $validated = array_merge($validated, $this->handleUploads($request, $shilajitManufacturingHero));

        $shilajitManufacturingHero->update($validated);

        return redirect()
            ->route('shilajit-manufacturing-hero.index')
            ->with('success', 'Hero section updated successfully.');
    }

    public function destroy(ShilajitManufacturingHero $shilajitManufacturingHero): RedirectResponse
    {
        $this->deleteImages($shilajitManufacturingHero);
        $shilajitManufacturingHero->delete();

        return redirect()
            ->route('shilajit-manufacturing-hero.index')
            ->with('success', 'Hero section deleted successfully.');
    }

    // -------------------------------------------------------------------------
    // Helpers
    // -------------------------------------------------------------------------

    private function validateRequest(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title'            => 'required|string|max:255',
            'highlighted_text' => 'required|string|max:255',
            'banner_desktop'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_mobile'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'banner_tablet'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'is_active'        => 'nullable|boolean',
        ]);
    }

    private function handleUploads(Request $request, ?ShilajitManufacturingHero $existing = null): array
    {
        $paths = [];

        foreach (['banner_desktop', 'banner_mobile', 'banner_tablet'] as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if replacing
                if ($existing && $existing->$field) {
                    Storage::disk('public')->delete($existing->$field);
                }
                $paths[$field] = $request->file($field)->store('shilajit-hero', 'public');
            } elseif ($existing) {
                // Keep existing value — don't overwrite with null
                $paths[$field] = $existing->$field;
            }
        }

        $paths['is_active'] = $request->boolean('is_active');

        return $paths;
    }

    private function deleteImages(ShilajitManufacturingHero $hero): void
    {
        foreach (['banner_desktop', 'banner_mobile', 'banner_tablet'] as $field) {
            if ($hero->$field) {
                Storage::disk('public')->delete($hero->$field);
            }
        }
    }
}