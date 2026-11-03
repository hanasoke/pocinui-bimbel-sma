@extends('layouts.admin')
@section('header', 'Detail Pengguna')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm max-w-2xl">
    <div class="flex items-center gap-6 mb-6">
        @if($user->photo)
            <img src="{{ asset('storage/' . $user->photo) }}" class="w-24 h-24 rounded-full object-cover border-4 border-gray-200">
        @else
            <div class="w-24 h-24 rounded-full bg-gray-300 flex items-center justify-center text-3xl font-bold border-4 border-gray-200">{{ substr($user->name, 0, 1) }}</div>
        @endif
        <div>
            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            <p class="text-gray-600">Role: <strong class="uppercase">{{ $user->role }}</strong></p>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 border-t pt-4">
        <div><span class="text-gray-500 text-sm">Username</span><br><strong>{{ $user->username }}</strong></div>
        <div><span class="text-gray-500 text-sm">Email</span><br><strong>{{ $user->email }}</strong></div>
        <div><span class="text-gray-500 text-sm">No. HP</span><br><strong>{{ $user->phone }}</strong></div>
        <div><span class="text-gray-500 text-sm">Kelas (Siswa)</span><br><strong>{{ $user->school_grade ?? '-' }}</strong></div>
        <div><span class="text-gray-500 text-sm">Tempat, Tanggal Lahir</span><br><strong>{{ $user->birthdate_location }}, {{ $user->birthdate }}</strong></div>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded shadow hover:bg-gray-600">Kembali</a>
    </div>
</div>
@endsection