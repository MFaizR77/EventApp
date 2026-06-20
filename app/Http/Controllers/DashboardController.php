<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the user dashboard with registered events.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Query Builder to fetch registered events count
        $registeredCount = DB::table('event_registrations')
            ->where('user_id', Auth::id())
            ->count();

        // Query Builder to fetch registered events details
        $registeredEvents = DB::table('event_registrations')
            ->join('events', 'event_registrations.event_id', '=', 'events.id')
            ->where('event_registrations.user_id', Auth::id())
            ->select(
                'events.id as event_id',
                'events.title as title',
                'events.description as description',
                'events.event_date as event_date',
                'event_registrations.registered_at as registered_at',
                'event_registrations.status as status'
            )
            ->orderBy('events.event_date', 'asc')
            ->get();

        return view('dashboard', compact('registeredCount', 'registeredEvents'));
    }
}
