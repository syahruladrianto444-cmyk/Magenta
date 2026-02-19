<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\BusinessUnit;
use App\Models\Portfolio;
use App\Models\News;
use App\Models\Career;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Event;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'units' => BusinessUnit::count(),
            'portfolios' => Portfolio::count(),
            'news' => News::count(),
            'careers' => Career::active()->open()->count(),
            'partners' => Partner::count(),
            'contacts' => Contact::unread()->count(),
            'total_contacts' => Contact::count(),
            'events' => Event::count(),
            'live_events' => Event::where('status', 'live')->count(),
            'clients' => User::where('role', 'client')->count(),
        ];

        $recentContacts = Contact::latest()->take(5)->get();
        $recentPortfolios = Portfolio::latest()->take(5)->get();
        $liveEvents = Event::where('status', 'live')->where('is_active', true)->latest()->take(4)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentPortfolios', 'liveEvents'));
    }
}
