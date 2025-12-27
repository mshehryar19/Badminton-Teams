@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm mt-5">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Login</h4>
                </div>

                <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                                placeholder="Enter your password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
