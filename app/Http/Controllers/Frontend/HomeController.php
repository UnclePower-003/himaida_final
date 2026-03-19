<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BrandSpotlight;
use App\Models\CareerHero;
use App\Models\CareerValueSection;
use App\Models\CertificationComponent;
use App\Models\ContactDetail;
use App\Models\ContactUsHero;
use App\Models\ContractManufacturing;
use App\Models\Corevalue;
use App\Models\Distributorship;
use App\Models\FAQ;
use App\Models\FAQBanner;
use App\Models\Formulation;
use App\Models\HomeHero;
use App\Models\HomeProductRange;
use App\Models\ManifacturingResearchAndInovation;
use App\Models\Manufacturing;
use App\Models\ManufacturingHeroSection;
use App\Models\ManufacturingHighlight;
use App\Models\ManufacturingOurPlant;
use App\Models\OpenPosition;
use App\Models\OurBrandHeroSection;
use App\Models\PrivateLabelHero;
use App\Models\PrivateLabelling;
use App\Models\ProcessStep;
use App\Models\ProductCategories;
use App\Models\ProductDesc;
use App\Models\Services;
use App\Models\Stat;
use App\Models\VisionMission;
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
        $visionMission = VisionMission::first();
        $corevalues = Corevalue::all();
        $manufacturing = Manufacturing::latest()->first();
        $certifications = CertificationComponent::all();

        return view('frontend.layouts.aboutus', compact('whoweare', 'visionMission', 'corevalues', 'manufacturing', 'certifications'));
    }

    public function privatelable()
    {
        $hero = PrivateLabelHero::latest()->first();
        $privateLabelling = PrivateLabelling::first();
        $distributorship = Distributorship::first();
        $contract = ContractManufacturing::latest()->first();

        return view('frontend.layouts.privatelable', compact('hero', 'privateLabelling', 'distributorship', 'contract'));
    }

    public function manufacture()
    {
        $hero = ManufacturingHeroSection::latest()->first();
        $plant = ManufacturingOurPlant::latest()->first();
        $leftHighlights = ManufacturingHighlight::where('column', 'left')
            ->orderBy('order')
            ->get();

        $rightHighlights = ManufacturingHighlight::where('column', 'right')
            ->orderBy('order')
            ->get();
        $certifications = CertificationComponent::all();
        $data = ManifacturingResearchAndInovation::first();

        return view('frontend.layouts.manufacturing', compact('hero', 'plant', 'leftHighlights', 'rightHighlights', 'certifications', 'data'));
    }

    public function careers()
    {
        $hero = CareerHero::latest()->first();
        $values = CareerValueSection::orderBy('id', 'asc')->get();
        $positions = OpenPosition::orderBy('id', 'asc')->get();

        return view('frontend.layouts.careers', compact('hero', 'values', 'positions'));
    }

    public function contactus()
    {
        $hero = ContactUsHero::active()->first();
        $contacts = ContactDetail::where('is_active', true)->get();

        return view('frontend.layouts.contactus', compact('hero', 'contacts'));
    }

    public function ourbrands()
    {
        $hero = OurBrandHeroSection::where('is_active', 1)->latest()->first();
        $brands = BrandSpotlight::where('active', true)->get();

        return view('frontend.layouts.ourbrands', compact('hero','brands'));
    }

    public function partnership()
    {
        return view('frontend.layouts.partnership');
    }
}
