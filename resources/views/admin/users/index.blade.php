@extends('layouts.admin')
@section('header', 'Data Pengguna')
@section('content')
<div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="p-4 border-b">Foto</th>
                <th class="p-4 border-b">Nama</th>
                <th class="p-4 border-b">Role</th>
                <th class="p-4 border-b">Email</th>
                <th class="p-4 border-b">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-4">
                    @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" class="w-10 h-10 rounded-full object-cover">
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center font-bold">{{ substr($user->name, 0, 1) }}</div>
                    @endif
                </td>
                <td class="p-4 font-semibold">{{ $user->name }} <br><span class="text-sm text-gray-500">@ {{ $user->username }}</span></td>
                <td class="p-4">
                    <span class="px-2 py-1 text-xs rounded text-white 
                        {{ $user->role == 'teacher' ? 'bg-green-500' : ($user->role == 'student' ? 'bg-blue-500' : 'bg-purple-500') }}">
                        {{ strtoupper($user->role) }}
                    </span>
                </td>
                <td class="p-4">{{ $user->email }}</td>
                <td class="p-4 flex gap-2">
                    <a href="{{ route('admin.users.show', $user->id) }}" class="bg-gray-500 text-white px-3 py-1 rounded text-sm hover:bg-gray-600">Detail</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini? Data absensi/mapel terkait juga akan terhapus!');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada pengguna terdaftar.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-4">{{ $users->links() }}</div>
@endsection