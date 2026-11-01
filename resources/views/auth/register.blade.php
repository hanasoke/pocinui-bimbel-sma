<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role (Admin, Teacher, Student) -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="" disabled selected>-- Pilih Role --</option>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Siswa</option>
                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>Guru</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('No. HP')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Birthdate & Location -->
        <div class="mt-4 flex gap-4">
            <div class="w-1/2">
                <x-input-label for="birthdate" :value="__('Tanggal Lahir')" />
                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required />
                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>
            <div class="w-1/2">
                <x-input-label for="birthdate_location" :value="__('Tempat Lahir')" />
                <x-text-input id="birthdate_location" class="block mt-1 w-full" type="text" name="birthdate_location" :value="old('birthdate_location')" required />
                <x-input-error :messages="$errors->get('birthdate_location')" class="mt-2" />
            </div>
        </div>

        <!-- School Grade (Hanya muncul jika Role = Student) -->
        <div class="mt-4" id="school_grade_container" style="display: none;">
            <x-input-label for="school_grade" :value="__('Kelas (Khusus Siswa)')" />
            <select id="school_grade" name="school_grade" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="">-- Pilih Kelas --</option>
                <option value="10" {{ old('school_grade') == '10' ? 'selected' : '' }}>Kelas 10</option>
                <option value="11" {{ old('school_grade') == '11' ? 'selected' : '' }}>Kelas 11</option>
                <option value="12" {{ old('school_grade') == '12' ? 'selected' : '' }}>Kelas 12</option>
            </select>
            <x-input-error :messages="$errors->get('school_grade')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>
            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script untuk menampilkan/menyembunyikan input Kelas berdasarkan Role -->
    <script>
        document.getElementById('role').addEventListener('change', function() {
            var gradeContainer = document.getElementById('school_grade_container');
            var gradeInput = document.getElementById('school_grade');
            
            if (this.value === 'student') {
                gradeContainer.style.display = 'block';
                gradeInput.setAttribute('required', 'required');
            } else {
                gradeContainer.style.display = 'none';
                gradeInput.removeAttribute('required');
                gradeInput.value = ''; // Reset value jika bukan siswa
            }
        });

        // Jalankan saat halaman dimuat (untuk menangani old() value jika ada error validasi)
        window.onload = function() {
            if (document.getElementById('role').value === 'student') {
                document.getElementById('school_grade_container').style.display = 'block';
                document.getElementById('school_grade').setAttribute('required', 'required');
            }
        };
    </script>
</x-guest-layout>