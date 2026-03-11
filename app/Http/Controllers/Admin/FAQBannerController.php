<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQBanner;
use Illuminate\Http\Request;

class FAQBannerController extends Controller
{
    public function index()
    {
        $banners = FAQBanner::latest()->get();

        return view('admin.layouts.homepage.faq_banners.index', compact('banners'));
    }

    public function create()
    {
        $banner = new FAQBanner;

        return view('admin.layouts.homepage.faq_banners.form', compact('banner'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->only('title');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faq_banner', 'public');
        }

        FAQBanner::create($data);

        return redirect()->route('faq_banners.index')
            ->with('success', 'Banner created successfully');
    }

    public function edit(FAQBanner $faq_banner)
    {
        $banner = $faq_banner;

        return view('admin.layouts.homepage.faq_banners.form', compact('banner'));
    }

    public function update(Request $request, FAQBanner $faq_banner)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        $data = $request->only('title');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('faq_banner', 'public');
        }

        $faq_banner->update($data);

        return redirect()->route('faq_banners.index')
            ->with('success', 'Banner updated successfully');
    }

    public function destroy(FAQBanner $faq_banner)
    {
        $faq_banner->delete();

        return back()->with('success', 'Banner deleted');
    }
}
