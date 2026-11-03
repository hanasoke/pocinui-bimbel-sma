@extends('layouts.admin')
@section('header', 'Tambah Mata Pelajaran')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm max-w-2xl">
    <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Mapel</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kelas</label>
            <input type="text" name="grade" value="{{ old('grade') }}" placeholder="Contoh: 10, 11, 12" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('grade') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jam Belajar (Angka)</label>
            <input type="number" name="watch_hours" value="{{ old('watch_hours', 0) }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('watch_hours') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Deskripsi (Opsional)</label>
            <textarea name="description" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Simpan</button>
        <a href="{{ route('admin.subjects.index') }}" class="text-gray-500 ml-4 hover:underline">Batal</a>
    </form>
</div>
@endsection