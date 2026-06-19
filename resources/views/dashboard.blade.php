<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-emerald-600 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-emerald-500">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">Selamat datang, {{ auth()->user()->name }}!</h3>
                    <p class="text-gray-600">Ini adalah dashboard pendaftaran event Anda. Di sini Anda dapat melihat ringkasan event yang Anda ikuti.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
