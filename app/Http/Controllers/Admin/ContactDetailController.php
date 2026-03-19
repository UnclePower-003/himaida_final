<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    public function index()
    {
        $contacts = ContactDetail::latest()->paginate(10);
        return view('admin.layouts.contactus.contact_details.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.layouts.contactus.contact_details.form', [
            'contact' => new ContactDetail()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'label' => 'nullable|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        // ✅ FIXED (reliable)
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('contact-icons', 'public');
        }

        ContactDetail::create($data);

        return redirect()->route('contact_details.index')
            ->with('success', 'Created successfully');
    }

    public function edit(ContactDetail $contactDetail)
    {
        return view('admin.layouts.contactus.contact_details.form', [
            'contact' => $contactDetail
        ]);
    }

    public function update(Request $request, ContactDetail $contactDetail)
    {
        $data = $request->validate([
            'label' => 'nullable|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
        ]);

        // ✅ FIXED (reliable)
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('contact-icons', 'public');
        }

        $contactDetail->update($data);

        return redirect()->route('contact_details.index')
            ->with('success', 'Updated successfully');
    }

    public function destroy(ContactDetail $contactDetail)
    {
        $contactDetail->delete();

        return back()->with('success', 'Deleted successfully');
    }
}