<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EventRegistrationController extends Controller
{
    /**
     * Handle registration of a user to an event.
     */
    public function register(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);
        $userId = Auth::id();

        // Prevent duplicate registration
        $alreadyRegistered = DB::table('event_registrations')
            ->where('user_id', $userId)
            ->where('event_id', $event->id)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar di event ini.');
        }

        // Insert registration record using Query Builder
        DB::table('event_registrations')->insert([
            'user_id' => $userId,
            'event_id' => $event->id,
            'status' => 'registered',
            'registered_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('events.show', $event->id)->with('success', 'Pendaftaran event berhasil!');
    }
}
