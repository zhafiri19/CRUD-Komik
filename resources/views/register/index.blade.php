@extends('main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">

            <main class="form-registrasi w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Form Registrasi</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror"
                            name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="username" placeholder="Username" value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" placeholder="Email" value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                            name="password" id="password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">sudah Registrasi? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
