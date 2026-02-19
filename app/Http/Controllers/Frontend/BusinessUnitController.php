<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BusinessUnit;

class BusinessUnitController extends Controller
{
    public function index()
    {
        $units = BusinessUnit::active()->ordered()->get();

        return view('frontend.business-units.index', compact('units'));
    }

    public function show(BusinessUnit $businessUnit)
    {
        if (!$businessUnit->is_active) {
            abort(404);
        }

        $portfolios = $businessUnit->portfolios()->active()->latest()->take(6)->get();

        return view('frontend.business-units.show', compact('businessUnit', 'portfolios'));
    }
}
