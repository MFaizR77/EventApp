<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     */
    public function index()
    {
        $events = Event::orderBy('event_date', 'asc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Display the specified event.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        
        // Check if user is already registered for this event
        $isRegistered = false;
        if (auth()->check()) {
            $isRegistered = DB::table('event_registrations')
                ->where('user_id', auth()->id())
                ->where('event_id', $event->id)
                ->exists();
        }

        return view('events.show', compact('event', 'isRegistered'));
    }
}
