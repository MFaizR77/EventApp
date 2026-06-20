<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Kelola Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Session Alerts -->
            @if(session('success'))
                <div class="mb-4 bg-emerald-50 border border-emerald-250 text-emerald-800 px-4 py-3 rounded-lg text-sm flex items-center space-x-2 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Events List Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-150">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-md font-bold text-gray-700">Daftar Event (Total: {{ $events->count() }})</h4>
                        <a href="{{ route('admin.events.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 transition ease-in-out duration-150">
                            + Tambah Event Baru
                        </a>
                    </div>

                    @if($events->isEmpty())
                        <div class="p-8 text-center text-gray-500">
                            Belum ada data event di database. Silakan seeder atau tambah baru.
                        </div>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Event</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal & Waktu</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi Singkat</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($events as $event)
                                        <tr class="hover:bg-gray-50 transition duration-150">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">
                                                {{ $event->title }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-indigo-600 font-medium">
                                                {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y - H:i') }} WIB
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                                {{ $event->description }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="flex items-center justify-end space-x-3">
                                                    <a href="{{ route('admin.events.edit', $event->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    
                                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                                    </form>
                                                </div>
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
