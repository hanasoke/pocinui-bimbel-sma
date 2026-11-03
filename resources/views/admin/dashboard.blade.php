@extends('layouts.admin')

@section('header', 'Dashboard Admin')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-sm">
    <h2 class="text-2xl font-bold mb-2">
        Selamat Datang, {{ Auth::user()->name }}!
    </h2>
    <p class="text-gray-600">
        Gunakan menu di samping untuk mengelola data Bimbel Pocinui.
    </p>
</div>
@endsection