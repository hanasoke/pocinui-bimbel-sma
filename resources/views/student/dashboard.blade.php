<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Siswa') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex items-center gap-4">
                    <!-- Menampilkan Foto Profil -->
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Foto Profil" class="w-20 h-20 rounded-full object-cover border-2 border-blue-500">
                    @else 
                        <!-- Default Avatar jika tidak upload foto -->
                        <div class="w-20 h-20 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 text-2xl font-bold border-2 border-gray-400">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    @endif

                    <div>
                        <h3 class="text-2xl font-bold">Halo, {{ Auth::user()->name }}!</h3>
                        <p class="text-gray-600">Kelas: {{ Auth::user()->school_grade ?? '-' }}</p>
                        <p class="text-sm text-gray-500">Selamat datang di Bimbel Pocinui</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>