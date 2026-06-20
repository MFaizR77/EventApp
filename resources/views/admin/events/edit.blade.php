<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Back to index link -->
            <div class="mb-4">
                <a href="{{ route('admin.events.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-900 transition">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Batal & Kembali
                </a>
            </div>

            <!-- Edit Form Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-150">
                <div class="p-8">
                    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Event Title -->
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">Judul Event</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $event->title) }}" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Masukkan judul event...">
                            @error('title')
                                <p class="text-sm text-red-650 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Event Date -->
                        <div>
                            <label for="event_date" class="block font-medium text-sm text-gray-700">Tanggal & Waktu Event</label>
                            <input type="datetime-local" name="event_date" id="event_date" value="{{ old('event_date', \Carbon\Carbon::parse($event->event_date)->format('Y-m-d\TH:i')) }}" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            @error('event_date')
                                <p class="text-sm text-red-650 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block font-medium text-sm text-gray-700">Deskripsi Event</label>
                            <textarea name="description" id="description" rows="6" required class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" placeholder="Tuliskan deskripsi lengkap event di sini...">{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-650 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end pt-4 border-t border-gray-100">
                            <a href="{{ route('admin.events.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mr-3">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                                Perbarui Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
