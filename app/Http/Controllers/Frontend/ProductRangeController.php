<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShilajitManufacturingHero;
use App\Models\ShilajitManufacturingProduct;

class ProductRangeController extends Controller
{
    public function shilajitmanufacturing()

    {
        $hero = ShilajitManufacturingHero::getActive();
        $products = ShilajitManufacturingProduct::active()
            ->ordered()
            ->get();
        return view('frontend.layouts.productrange.shilajitmanufacturing',compact('hero','products'));
    }

    public function supplimentmanufacturing()
    {
        return view('frontend.layouts.productrange.supplimentmanufacturing');
    }

    public function herbalmanufacturing()
    {
        return view('frontend.layouts.productrange.herbalmanufacturing');
    }

    public function spicesmanufacturing()
    {
        return view('frontend.layouts.productrange.spicesmanufacturing');
    }

    public function driedfood()
    {
        return view('frontend.layouts.productrange.driedfood');
    }

    public function honeyproduts()
    {
        return view('frontend.layouts.productrange.honeyproduts');
    }

    public function tea()
    {
        return view('frontend.layouts.productrange.tea');
    }

    public function honeymanufacturing()
    {
        return view('frontend.layouts.productrange.honeymanufacturing');
    }
}
