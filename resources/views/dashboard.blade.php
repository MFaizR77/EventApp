<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Box -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                <div class="p-6 text-gray-900 flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div>
                        <h3 class="text-lg font-bold mb-2">Selamat datang, {{ auth()->user()->name }}!</h3>
                        <p class="text-gray-600 text-sm">Ini adalah dashboard pendaftaran event Anda. Pantau terus status keikutsertaan Anda di bawah ini.</p>
                    </div>
                    <!-- Stat Card -->
                    <div class="mt-4 md:mt-0 bg-indigo-50 border border-indigo-100 rounded-lg p-4 flex items-center space-x-3">
                        <div class="p-2 bg-indigo-500 rounded-lg text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs text-gray-500 font-semibold uppercase tracking-wider">Event Diikuti</div>
                            <div class="text-2xl font-extrabold text-indigo-600">{{ $registeredCount }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registered Events List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-150">
                <div class="p-6 text-gray-900">
                    <h4 class="text-md font-bold text-gray-700 mb-4">Event yang Saya Ikuti</h4>

                    @if($registeredEvents->isEmpty())
                        <div class="text-center py-8">
                            <p class="text-gray-500 mb-4">Anda belum mendaftar di event mana pun.</p>
                            <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 transition shadow-sm">
                                Cari Event Menarik
                            </a>
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Event</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Event</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Terdaftar</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($registeredEvents as $regEvent)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                {{ $regEvent->title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-600 font-medium">
                                                {{ \Carbon\Carbon::parse($regEvent->event_date)->translatedFormat('d F Y - H:i') }} WIB
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($regEvent->registered_at)->translatedFormat('d F Y - H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800 border border-emerald-250">
                                                    {{ $regEvent->status === 'registered' ? 'Terdaftar' : $regEvent->status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('events.show', $regEvent->event_id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                    Lihat Info
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
