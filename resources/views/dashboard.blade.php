@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Dashboard</h4>
                </div>

                <div class="card-body">
                    <p class="mb-4">Welcome! You are logged in.</p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('teams.index') }}" class="btn btn-success">
                            Manage Teams
                        </a>

                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
