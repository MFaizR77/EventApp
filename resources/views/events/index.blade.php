<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Daftar Event Tersedia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <p class="text-gray-600">Temukan berbagai event menarik dan daftarkan diri Anda sekarang!</p>
            </div>

            @if($events->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 text-center border-l-4 border-amber-500">
                    <p class="text-gray-500 text-lg">Belum ada event yang terdaftar saat ini.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($events as $event)
                        <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition duration-200 rounded-lg border border-gray-100 flex flex-col justify-between">
                            <div class="p-6">
                                <!-- Event Date -->
                                <div class="flex items-center space-x-2 text-sm text-indigo-500 font-semibold mb-3">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y - H:i') }} WIB</span>
                                </div>

                                <!-- Event Title -->
                                <h3 class="text-lg font-bold text-gray-800 mb-2 hover:text-indigo-600 transition">
                                    {{ $event->title }}
                                </h3>

                                <!-- Event Description -->
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                    {{ $event->description }}
                                </p>
                            </div>

                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                                <span class="text-xs text-gray-400">Pendaftaran dibuka</span>
                                <a href="{{ route('events.show', $event->id) }}" class="inline-flex items-center px-3 py-1.5 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
