<x-layout>
    <x-slot name="title">Login</x-slot>
    <body class="bg-gradient-primary">

    <!-- Outer Row -->
    <div class="row">
        <div class="col-lg-4 col-md-10 offset-md-1 offset-lg-4">
            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
{{--                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>--}}
<div class="col-md-12">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
        </div>
        <form action="{{ route('login.submit')  }}" method="post" class="user">
            @csrf
            @if(session('message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="form-group mb-3">
                <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" aria-describedby="emailHelp" placeholder="Enter Email Address..." value="{{ old('email') }}"/>

                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password"/>

                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                </div>
            </div>

            <button class="d-grid gap-2 col-6 mx-auto btn btn-primary btn-user d-grid">
                Login
            </button>
        </form>
        <hr>
        <div class="text-center">
            <a class="small" href="{{ url('/passwords/forgot') }}">Forgot Password?</a>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

</x-layout>
