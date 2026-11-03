@extends('layouts.admin')
@section('header', 'Edit Mata Pelajaran')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm max-w-2xl">
    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- PENTING UNTUK UPDATE -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Mapel</label>
            <input type="text" name="name" value="{{ old('name', $subject->name) }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <!-- (Copy paste sisa input grade, watch_hours, description dari create, ganti value old() menjadi old('field', $subject->field)) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kelas</label>
            <input type="text" name="grade" value="{{ old('grade', $subject->grade) }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jam Belajar</label>
            <input type="number" name="watch_hours" value="{{ old('watch_hours', $subject->watch_hours) }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="3">{{ old('description', $subject->description) }}</textarea>
        </div>
        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600">Update</button>
        <a href="{{ route('admin.subjects.index') }}" class="text-gray-500 ml-4 hover:underline">Batal</a>
    </form>
</div>
@endsection