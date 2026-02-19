<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $clients = Partner::active()->ofType('client')->ordered()->get();
        $partners = Partner::active()->ofType('partner')->ordered()->get();
        $communities = Partner::active()->ofType('community')->ordered()->get();

        return view('frontend.partners', compact('clients', 'partners', 'communities'));
    }
}
