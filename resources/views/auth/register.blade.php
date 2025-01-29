@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center mb-4">
        <svg height="80" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="mb-3">
            <!-- Background circle -->
            <circle cx="100" cy="100" r="90" fill="#3498db"/>
            
            <!-- Text lines suggesting a blog post -->
            <g fill="white" transform="translate(50, 60)">
                <!-- The "M" shape -->
                <path d="M10 80 L30 40 L50 80 L70 40 L90 80" 
                      stroke="white" 
                      stroke-width="8" 
                      fill="none" 
                      stroke-linecap="round"/>
                
                <!-- Blog post lines -->
                <rect x="20" y="0" width="60" height="6" rx="3"/>
                <rect x="10" y="15" width="80" height="6" rx="3"/>
                <rect x="15" y="30" width="70" height="6" rx="3"/>
            </g>
            
            <!-- Pen tip overlay -->
            <path d="M140 140 L130 130 L150 150 Z" 
                  fill="white" 
                  transform="rotate(-45, 140, 140)"/>
        </svg>
        <h1 class="h3 mb-3 fw-normal">Create your account</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border">
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input id="name" type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" 
                                required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">Confirm password</label>
                            <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button type="submit" class="btn btn-success w-100 mb-3">
                            Sign in
                        </button>
                    </form>
                </div>
            </div>

            <div class="card mt-3 border">
                <div class="card-body text-center p-3">
                    <span class="small">Already have an account? </span>
                    <a href="{{ route('login') }}" class="text-decoration-none small link-purple">Sign in</a>.
                </div>
            </div>
        </div>
    </div>
</div>


@endsection