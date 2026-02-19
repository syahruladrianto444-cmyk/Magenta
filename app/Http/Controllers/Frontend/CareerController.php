<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(Request $request)
    {
        $query = Career::active()->open();

        // Filter by department
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }

        // Filter by type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $careers = $query->latest()->paginate(10);

        // Get unique departments
        $departments = Career::active()->open()
            ->whereNotNull('department')
            ->distinct()
            ->pluck('department');

        return view('frontend.career.index', compact('careers', 'departments'));
    }

    public function show(Career $career)
    {
        if (!$career->is_active) {
            abort(404);
        }

        $relatedCareers = Career::active()
            ->open()
            ->where('id', '!=', $career->id)
            ->when($career->department, function ($q) use ($career) {
                $q->where('department', $career->department);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.career.show', compact('career', 'relatedCareers'));
    }
}
