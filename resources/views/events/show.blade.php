<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Detail Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Back to Events list link -->
            <div class="mb-4">
                <a href="{{ route('events.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-900 transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Event
                </a>
            </div>

            <!-- Event Card Details -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-150">
                <div class="p-8">
                    <!-- Date Info -->
                    <div class="flex items-center space-x-2 text-sm text-indigo-600 font-semibold mb-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y - H:i') }} WIB</span>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-6">
                        {{ $event->title }}
                    </h1>

                    <!-- Description Section -->
                    <div class="prose max-w-none text-gray-600 mb-8 leading-relaxed">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Deskripsi Event</h3>
                        <p class="whitespace-pre-line">{{ $event->description }}</p>
                    </div>

                    <!-- Registration Box / CTA -->
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col md:flex-row justify-between items-center">
                        <div class="mb-4 md:mb-0">
                            <h4 class="text-sm font-semibold text-gray-700">Status Pendaftaran</h4>
                            <p class="text-xs text-gray-500 mt-1">
                                @if($isRegistered)
                                    Anda telah terdaftar untuk mengikuti event ini.
                                @else
                                    Pendaftaran sedang dibuka untuk umum.
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            @auth
                                @if($isRegistered)
                                    <button disabled class="inline-flex items-center px-6 py-3 bg-gray-300 text-gray-500 font-semibold rounded-lg text-sm cursor-not-allowed uppercase tracking-wider">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Sudah Terdaftar
                                    </button>
                                @else
                                    <form action="{{ route('events.register', $event->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg text-sm transition shadow-sm uppercase tracking-wider">
                                            Daftar Sekarang
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg text-sm transition shadow-sm uppercase tracking-wider">
                                    Login untuk Mendaftar
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
