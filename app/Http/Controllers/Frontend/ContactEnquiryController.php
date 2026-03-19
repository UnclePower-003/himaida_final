<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactEnquiry;

class ContactEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);

        ContactEnquiry::create($request->all());

        // return back()->with('success', 'Thank you for your enquiry. We will contact you soon!');
        return redirect()->to(url()->previous() . '#enquries_form')
             ->with('success', 'Thank you for your enquiry! We will contact you soon.');
        
    }
}
