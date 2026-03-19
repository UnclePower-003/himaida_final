<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use Illuminate\Http\Request;

class ContactEnquiryController extends Controller
{
    // Admin index page (Blade view)
    public function index()
    {
        // The Blade will use AJAX to load enquiries
        return view('admin.layouts.contact_enquiries.index');
    }

    // JSON endpoint for AJAX dynamic table
    public function getEnquiriesJson()
    {
        $enquiries = ContactEnquiry::latest()->get();
        return response()->json($enquiries);
    }

    // Show a single enquiry
    public function show(ContactEnquiry $contactEnquiry)
    {
        return view('admin.layouts.contact_enquiries.show', compact('contactEnquiry'));
    }

    // Update an enquiry (from edit form)
    public function update(Request $request, ContactEnquiry $contactEnquiry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'active' => 'sometimes|boolean',
        ]);

        $contactEnquiry->update($validated);

        return redirect()->route('contact_enquiries.index')->with('success', 'Enquiry updated successfully');
    }

    // Delete enquiry (supports AJAX)
    public function destroy(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->delete();

        if (request()->ajax()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Enquiry deleted successfully');
    }

    // Toggle active status (supports AJAX)
    public function toggleActive(ContactEnquiry $contactEnquiry)
    {
        $contactEnquiry->active = ! $contactEnquiry->active;
        $contactEnquiry->save();

        return response()->json([
            'success' => true,
            'active' => $contactEnquiry->active,
        ]);
    }
}