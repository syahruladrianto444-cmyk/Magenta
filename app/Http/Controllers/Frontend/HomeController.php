<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\BusinessUnit;
use App\Models\Portfolio;
use App\Models\News;
use App\Models\Partner;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->take(4)->get();
        $businessUnits = BusinessUnit::active()->ordered()->get();
        $portfolios = Portfolio::active()->featured()->with('businessUnit')->latest()->take(6)->get();
        $news = News::active()->published()->latest()->take(3)->get();
        $clients = Partner::active()->ofType('client')->ordered()->take(12)->get();

        return view('frontend.home', compact(
            'services',
            'businessUnits',
            'portfolios',
            'news',
            'clients'
        ));
    }
}
