@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tournaments</h2>

        <!-- Button trigger modal -->
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTournamentModal">
            + Create Tournament
        </button>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Table --}}
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Name</th>
                <th>Max Teams</th>
                <th>Status</th>
                <th width="120">Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($tournaments as $tournament)
            <tr>
                <td>{{ $tournament->name }}</td>
                <td>{{ $tournament->max_teams }}</td>
                <td>
                    <span class="badge bg-info">
                        {{ ucfirst($tournament->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('tournaments.show', $tournament) }}"
                       class="btn btn-sm btn-secondary">
                        View
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    No tournaments created yet
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<!-- ===============================
     CREATE TOURNAMENT MODAL
================================ -->
<div class="modal fade" id="createTournamentModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('tournaments.store') }}" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Create Tournament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Tournament Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Max Teams</label>
                    <input type="number" name="max_teams" class="form-control"
                           min="2" required>
                    <small class="text-muted">
                        Must be an even number (2, 4, 8, etc.)
                    </small>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
