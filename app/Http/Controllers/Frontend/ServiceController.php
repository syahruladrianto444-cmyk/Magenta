<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();

        return view('frontend.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }

        $relatedPortfolios = $service->portfolios()->active()->latest()->take(4)->get();

        return view('frontend.services.show', compact('service', 'relatedPortfolios'));
    }
}
