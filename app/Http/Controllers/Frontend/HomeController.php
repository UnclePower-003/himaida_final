<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQBanner;
use App\Models\Formulation;
use App\Models\HomeHero;
use App\Models\HomeProductRange;
use App\Models\ProcessStep;
use App\Models\ProductCategories;
use App\Models\ProductDesc;
use App\Models\Services;
use App\Models\Stat;
use App\Models\Whoweare;

class HomeController extends Controller
{
    public function home()
    {
        $homehero = HomeHero::latest()->first();
        $products = HomeProductRange::all();
        $descs = ProductDesc::all();
        $categories = ProductCategories::all();
        // Get the featured service (big left card)
        $featuredService = Services::where('is_featured', true)->first();

        // Get all other services (normal cards)
        $otherServices = Services::where('is_featured', false)->get();
        $processSteps = ProcessStep::orderBy('id')->get();
        $formulations = Formulation::where('status', true)->get();
        $stats = Stat::all();
        $faqs = FAQ::where('is_active', true)->orderBy('id', 'asc')->get();
        $banner = FAQBanner::latest()->first();

        return view('frontend.layouts.home', compact('homehero', 'products', 'descs', 'categories', 'featuredService', 'otherServices', 'processSteps', 'formulations', 'stats', 'faqs', 'banner'));
    }

    public function aboutus()
    {
        $whoweare = Whoweare::first();
        return view('frontend.layouts.aboutus', compact('whoweare'));
    }

    public function privatelable()
    {
        return view('frontend.layouts.privatelable');
    }

    public function manufacturing()
    {
        return view('frontend.layouts.manufacturing');
    }

    public function careers()
    {
        return view('frontend.layouts.careers');
    }

    public function contactus()
    {
        return view('frontend.layouts.contactus');
    }

    public function ourbrands()
    {
        return view('frontend.layouts.ourbrands');
    }

    public function partnership()
    {
        return view('frontend.layouts.partnership');
    }
}
