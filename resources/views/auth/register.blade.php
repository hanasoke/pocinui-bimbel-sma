@extends('layouts.sign')

@section('title', 'Register Dashboard')

@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach 
                            </ul>
                        </div>
                    @endif

                    <form class="user" action="{{ route('register.store') }}" method="POST">
                        @csrf 
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap">
                            </div>
                            <div class="col-sm-6">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control"  placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Nomor Telpon">
                            </div>
                            <div class="col-sm-6">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="Birthdate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="school_grade">Tingkat Sekolah</label>
                            <select name="school_grade" id="school_grade" class="form-control" placeholder="School Grade">
                                <option value="">Pilih Tingkat</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password">Password</label>
                                <input type="password" class="form-control"
                                    id="password" placeholder="Password">
                            </div>
                            <div class="col-sm-6">
                                <label for="confirm_password">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Password Confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="school_grade">Role</label>
                                <select name="school_grade" id="school_grade" class="form-control" placeholder="School Grade">
                                    <option value="">Pilih Role</option>
                                    <option value="SD">Admin</option>
                                    <option value="SMP">Student</option>
                                    <option value="SMA">Teacher</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" placeholder="Input Photo Profile">
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register
                        </button>
                    </form>
                    
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection