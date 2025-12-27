@extends('layouts.app')

@section('content')

<h2>Edit Team</h2>

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        Please fix the errors below.
    </div>
@endif

<form method="POST" action="{{ route('teams.update', $team) }}" enctype="multipart/form-data">
@csrf
@method('PUT')

{{-- Team Name --}}
<div class="mb-3">
    <label class="form-label">Team Name</label>
    <input type="text"
           name="team_name"
           class="form-control @error('team_name') is-invalid @enderror"
           value="{{ old('team_name', $team->team_name) }}">
    @error('team_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Coach Name --}}
<div class="mb-3">
    <label class="form-label">Coach Name</label>
    <input type="text"
           name="coach_name"
           class="form-control @error('coach_name') is-invalid @enderror"
           value="{{ old('coach_name', $team->coach_name) }}">
    @error('coach_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Player 1 --}}
<div class="mb-3">
    <label class="form-label">Player 1 Name</label>
    <input type="text"
           name="player1_name"
           class="form-control @error('player1_name') is-invalid @enderror"
           value="{{ old('player1_name', $team->player1_name) }}">
    @error('player1_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label class="form-label">Player 1 Image</label>

    @if($team->player1_image)
        <div class="mb-2 p-2 border rounded bg-light text-center">
            <small class="d-block mb-1 text-muted">Current Image</small>
            <img src="{{ asset('storage/'.$team->player1_image) }}"
                 class="img-thumbnail"
                 style="max-width: 150px;">
        </div>
    @endif

    <input type="file"
           name="player1_image"
           class="form-control @error('player1_image') is-invalid @enderror">

    @error('player1_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Player 2 --}}
<div class="mb-3">
    <label class="form-label">Player 2 Name</label>
    <input type="text"
           name="player2_name"
           class="form-control @error('player2_name') is-invalid @enderror"
           value="{{ old('player2_name', $team->player2_name) }}">
    @error('player2_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label class="form-label">Player 2 Image</label>

    @if($team->player2_image)
        <div class="mb-2 p-2 border rounded bg-light text-center">
            <small class="d-block mb-1 text-muted">Current Image</small>
            <img src="{{ asset('storage/'.$team->player2_image) }}"
                 class="img-thumbnail"
                 style="max-width: 150px;">
        </div>
    @endif

    <input type="file"
           name="player2_image"
           class="form-control @error('player2_image') is-invalid @enderror">

    @error('player2_image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- Team Logo --}}
<div class="mb-4">
    <label class="form-label">Team Logo</label>

    @if($team->team_logo)
        <div class="mb-2 p-2 border rounded bg-light text-center">
            <small class="d-block mb-1 text-muted">Current Logo</small>
            <img src="{{ asset('storage/'.$team->team_logo) }}"
                 class="img-thumbnail"
                 style="max-width: 150px;">
        </div>
    @endif

    <input type="file"
           name="team_logo"
           class="form-control @error('team_logo') is-invalid @enderror">

    @error('team_logo')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">
    Update Team
</button>

</form>
@endsection
