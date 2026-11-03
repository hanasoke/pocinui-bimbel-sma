@extends('layouts.admin')
@section('header', 'Daftar Mata Pelajaran')
@section('content')
<div class="mb-4">
    <a href="{{ route('admin.subjects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Tambah Mapel</a>
</div>
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="p-4 border-b">No</th>
                <th class="p-4 border-b">Nama Mapel</th>
                <th class="p-4 border-b">Kelas</th>
                <th class="p-4 border-b">Jam Belajar</th>
                <th class="p-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subjects as $index => $subject)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">{{ $subjects->firstItem() + $index }}</td>
                <td class="p-4 font-semibold">{{ $subject->name }}</td>
                <td class="p-4">{{ $subject->grade }}</td>
                <td class="p-4">{{ $subject->watch_hours }} Jam</td>
                <td class="p-4 flex gap-2">
                    <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Yakin hapus mapel ini?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada data mapel.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $subjects->links() }}</div>
@endsection