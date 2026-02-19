<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $events = $user->events()
            ->orderBy('event_date', 'desc')
            ->get();

        $liveEvents = $events->where('status', 'live');
        $preparingEvents = $events->where('status', 'preparing');
        $completedEvents = $events->where('status', 'completed');

        return view('client.dashboard', compact('events', 'liveEvents', 'preparingEvents', 'completedEvents'));
    }
}
