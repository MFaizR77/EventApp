<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-600 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-indigo-500">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-2">Selamat datang di Panel Admin!</h3>
                    <p class="text-gray-600 mb-4">Sebagai administrator, Anda dapat mengelola seluruh event yang tersedia dalam aplikasi.</p>
                    <div class="mt-4">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-950 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kelola Event (CRUD)
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
