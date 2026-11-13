@extends('layouts.sign')

@section('title', 'Login Dashboard')

@section('content')

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-8 col-md-8">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">
                                    Welcome Back!
                                </h1>
                            </div>
                            
                            <!-- Pesan error -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <!-- Pesan sukses -->
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form class="user" action="{{ route('login.authenticate') }}" method="POST">

                                @csrf

                                <!-- Username atau Email -->
                                <div class="form-group">
                                    <input type="text" name="login" class="form-control form-control-user @error('login') is-invalid @enderror" placeholder="Enter Username or Email..." value="{{ old('login') }}" autocomplete="username" required autofocus>

                                    @error('login')
                                        <div class="text-danger small mt-1">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Password -->
                                <div class="form-group">

                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" autocomplate="current-password" required>
                                    
                                </div>

                                <!-- Remember Me -->
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" name="remember" class="custom-control-input" id="customCheck" value="1">

                                        <label class="custom-control-label" for="customCheck">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>

                            <hr>
                            
                            <div class="text-center">
                                <a class="small" href="#">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('register') }}" class="small">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection