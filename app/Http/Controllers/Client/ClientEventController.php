<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Event;

class ClientEventController extends Controller
{
    public function index()
    {
        $events = auth()->user()->events()
            ->orderBy('event_date', 'desc')
            ->get();

        return view('client.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        // Verify client has access to this event
        if (!auth()->user()->events()->where('events.id', $event->id)->exists()) {
            abort(403, 'Anda tidak memiliki akses ke event ini.');
        }

        return view('client.events.show', compact('event'));
    }
}
