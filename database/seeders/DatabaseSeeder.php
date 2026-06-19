<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Admin User
        User::create([
            'name' => 'Admin EventApp',
            'email' => 'admin@eventapp.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Seed Regular User
        User::create([
            'name' => 'Faiz Ramdhani',
            'email' => 'fizramdhh777@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Seed 5 Dummy Events
        Event::create([
            'title' => 'Tech Conference 2026',
            'description' => 'A conference about modern technology, AI, and developer tools. Join us for talks from industry experts and hands-on workshops.',
            'event_date' => '2026-07-15 09:00:00',
        ]);

        Event::create([
            'title' => 'Laravel Meetup Bandung',
            'description' => 'Meet other Laravel developers in Bandung. Discussing Laravel 12 features, Breeze, and Livewire with the local community.',
            'event_date' => '2026-08-10 18:30:00',
        ]);

        Event::create([
            'title' => 'Web Dev Bootcamp',
            'description' => 'Intensive 3-day bootcamp covering HTML, CSS, JavaScript, and Laravel backend development for beginners and intermediate devs.',
            'event_date' => '2026-09-01 10:00:00',
        ]);

        Event::create([
            'title' => 'Hackathon AI Innovations',
            'description' => 'Build AI products in 24 hours. Great prizes, free food, and mentorship from industry leaders and AI engineers.',
            'event_date' => '2026-10-24 08:00:00',
        ]);

        Event::create([
            'title' => 'UI/UX Workshop: Designing for Humans',
            'description' => 'Learn the fundamentals of visual design, user research, wireframing, and Figma tools in this intensive masterclass.',
            'event_date' => '2026-11-12 14:00:00',
        ]);
    }
}
