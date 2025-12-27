@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm mt-5">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Register</h4>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Enter your name"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control"
                                placeholder="Enter your email"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control"
                                placeholder="Create a password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Register
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <small>
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-decoration-none">
                                Login here
                            </a>
                        </small>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
