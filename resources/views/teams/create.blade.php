@extends('layouts.app')

@section('content')

<h2>Create Team</h2>

{{-- Success Message --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- Global Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Please fix the errors below.</strong>
    </div>
@endif

<form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Team Name</label>
        <input
            type="text"
            name="team_name"
            class="form-control @error('team_name') is-invalid @enderror"
            value="{{ old('team_name') }}"
            placeholder="Enter Team Name"
        >
        @error('team_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Coach Name</label>
        <input
            type="text"
            name="coach_name"
            class="form-control @error('coach_name') is-invalid @enderror"
            value="{{ old('coach_name') }}"
            placeholder="Enter Coach Name"
        >
        @error('coach_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Player 1 Name</label>
        <input
            type="text"
            name="player1_name"
            class="form-control @error('player1_name') is-invalid @enderror"
            value="{{ old('player1_name') }}"
            placeholder="Enter Player 1 Name"
        >
        @error('player1_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Player 1 Image</label>
        <input
            type="file"
            name="player1_image"
            class="form-control @error('player1_image') is-invalid @enderror"
        >
        @error('player1_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Player 2 Name</label>
        <input
            type="text"
            name="player2_name"
            class="form-control @error('player2_name') is-invalid @enderror"
            value="{{ old('player2_name') }}"
            placeholder="Enter Player 2 Name"
        >
        @error('player2_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Player 2 Image</label>
        <input
            type="file"
            name="player2_image"
            class="form-control @error('player2_image') is-invalid @enderror"
        >
        @error('player2_image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Team Logo</label>
        <input
            type="file"
            name="team_logo"
            class="form-control @error('team_logo') is-invalid @enderror"
        >
        @error('team_logo')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Create Team
    </button>
</form>

@endsection
