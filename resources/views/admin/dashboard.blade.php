<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Box -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">Selamat datang di Panel Admin!</h3>
                    <p class="text-gray-600">Sebagai administrator, Anda dapat memantau dan mengelola seluruh event yang aktif dalam sistem.</p>
                </div>
            </div>

            <!-- Events List Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-150">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-md font-bold text-gray-700">Daftar Event (Total: {{ $events->count() }})</h4>
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 transition ease-in-out duration-150">
                            + Tambah Event Baru (CRUD)
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
                                        <th scope="col" class="px-6 py-3 class=text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi (CRUD)</th>
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
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                                <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
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
