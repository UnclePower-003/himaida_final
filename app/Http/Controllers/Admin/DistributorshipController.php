<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributorship;
use Illuminate\Http\Request;

class DistributorshipController extends Controller
{
    public function index()
    {
        $data = Distributorship::latest()->get();
        return view('admin.layouts.privatelable.distributorship.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layouts.privatelable.distributorship.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'points' => 'nullable|array',
            'contact_text' => 'nullable|array',
            
            'contact_icon.*' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:4096',
        ]);

        // Store main image
        $image = $request->hasFile('image') ? $request->file('image')->store('distributorship', 'public') : null;

        // Handle contacts
        $contacts = [];
        if($request->contact_text) {
            foreach($request->contact_text as $index => $text) {
                if($text) {
                    $icon = $request->file('contact_icon')[$index] ?? null;
                    $icon_path = $icon ? $icon->store('distributorship/contacts','public') : null;

                    $contacts[] = [
                        'text' => $text,
                        'link' => $request->contact_link[$index] ?? '',
                        'icon' => $icon_path
                    ];
                }
            }
        }

        Distributorship::create([
            'title' => $request->title,
            'description' => $request->description,
            'points' => $request->points,
            'image' => $image,
            'contacts' => $contacts,
        ]);

        return redirect()->route('distributorship.index');
    }

    public function edit($id)
    {
        $data = Distributorship::findOrFail($id);
        return view('admin.layouts.privatelable.distributorship.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Distributorship::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'points' => 'nullable|array',
            'contact_text' => 'nullable|array',
            'contact_link' => 'nullable|array',
            'contact_icon.*' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif|max:4096',
        ]);

        // Update main image if uploaded
        if($request->hasFile('image')){
            $data->image = $request->file('image')->store('distributorship','public');
        }

        // Handle contacts update
        $contacts = [];
        if($request->contact_text) {
            foreach($request->contact_text as $index => $text) {
                if($text) {
                    $icon = $request->file('contact_icon')[$index] ?? null;
                    $icon_path = $icon ? $icon->store('distributorship/contacts','public') : ($data->contacts[$index]['icon'] ?? null);

                    $contacts[] = [
                        'text' => $text,
                        'link' => $request->contact_link[$index] ?? '',
                        'icon' => $icon_path
                    ];
                }
            }
        }

        $data->update([
            'title' => $request->title,
            'description' => $request->description,
            'points' => $request->points,
            'contacts' => $contacts,
        ]);

        return redirect()->route('distributorship.index');
    }

    public function destroy($id)
    {
        Distributorship::destroy($id);
        return back();
    }
}