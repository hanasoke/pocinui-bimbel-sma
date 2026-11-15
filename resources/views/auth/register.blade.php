
@extends('layouts.sign')

@section('title', 'Register Dashboard')

@section('content')

<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-10 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">

            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-12">

                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    Create an Account!
                                </h1>
                            </div>

                            {{-- Menampilkan error validasi --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Periksa kembali data kamu!</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="user"
                                  action="{{ route('register.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                {{-- Nama dan Username --}}
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <label for="name">Nama Lengkap</label>

                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control
                                               @error('name') is-invalid @enderror"
                                               placeholder="Nama Lengkap"
                                               value="{{ old('name') }}"
                                               required>

                                        @error('name')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="username">Username</label>

                                        <input type="text"
                                               name="username"
                                               id="username"
                                               class="form-control
                                               @error('username') is-invalid @enderror"
                                               placeholder="Username"
                                               value="{{ old('username') }}"
                                               required>

                                        @error('username')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Email --}}
                                <div class="form-group">

                                    <label for="email">Email</label>

                                    <input type="email"
                                           name="email"
                                           id="email"
                                           class="form-control
                                           @error('email') is-invalid @enderror"
                                           placeholder="Email Address"
                                           value="{{ old('email') }}"
                                           required>

                                    @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>

                                {{-- Phone dan Birthdate --}}
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <label for="phone">Phone</label>

                                        <input type="tel"
                                               name="phone"
                                               id="phone"
                                               class="form-control
                                               @error('phone') is-invalid @enderror"
                                               placeholder="Nomor Telepon"
                                               value="{{ old('phone') }}">

                                        @error('phone')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="birthdate">Birthdate</label>

                                        <input type="date"
                                               name="birthdate"
                                               id="birthdate"
                                               class="form-control
                                               @error('birthdate') is-invalid @enderror"
                                               value="{{ old('birthdate') }}">

                                        @error('birthdate')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Tempat Lahir --}}
                                <div class="form-group">

                                    <label for="birthdate_location">
                                        Tempat Lahir
                                    </label>

                                    <input type="text"
                                           name="birthdate_location"
                                           id="birthdate_location"
                                           class="form-control
                                           @error('birthdate_location') is-invalid @enderror"
                                           placeholder="Tempat Lahir"
                                           value="{{ old('birthdate_location') }}">

                                    @error('birthdate_location')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>

                                {{-- School Grade --}}
                                <div class="form-group">

                                    <label for="school_grade">
                                        Tingkat Sekolah
                                    </label>

                                    <select name="school_grade"
                                            id="school_grade"
                                            class="form-control
                                            @error('school_grade') is-invalid @enderror">

                                        <option value="">
                                            Pilih Tingkat
                                        </option>

                                        @foreach (['SD', 'SMP', 'SMA', 'Mahasiswa'] as $grade)
                                            <option value="{{ $grade }}"
                                                {{ old('school_grade') == $grade ? 'selected' : '' }}>
                                                {{ $grade }}
                                            </option>
                                        @endforeach

                                    </select>

                                    @error('school_grade')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>

                                {{-- Password --}}
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">

                                        <label for="password">Password</label>

                                        <input type="password"
                                               name="password"
                                               id="password"
                                               class="form-control
                                               @error('password') is-invalid @enderror"
                                               placeholder="Password"
                                               autocomplete="new-password"
                                               required>

                                        @error('password')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                    </div>

                                    <div class="col-sm-6">

                                        <label for="password_confirmation">
                                            Konfirmasi Password
                                        </label>

                                        <input type="password"
                                               name="password_confirmation"
                                               id="password_confirmation"
                                               class="form-control"
                                               placeholder="Konfirmasi Password"
                                               autocomplete="new-password"
                                               required>

                                    </div>

                                </div>

                                {{-- Photo --}}
                                <div class="form-group">

                                    <label for="photo">
                                        Foto Profil
                                    </label>

                                    <input type="file"
                                           name="photo"
                                           id="photo"
                                           class="form-control-file
                                           @error('photo') is-invalid @enderror"
                                           accept="image/jpeg,image/png,image/jpg">

                                    @error('photo')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                </div>

                                {{-- Role tidak diisi oleh pengguna --}}
                                <button type="submit"
                                        class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>

                            </form>

                            <hr>

                            <div class="text-center">
                                <a class="small"
                                   href="{{ route('login') }}">
                                    Already have an account? Login!
                                </a>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
