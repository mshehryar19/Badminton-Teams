@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Enter Match Score</h3>

    <div class="card">
        <div class="card-body">

            <form method="POST"
                  action="{{ route('matches.storeScore', $match) }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">
                            {{ $match->teamOne->team_name }}
                        </label>
                        <input type="number"
                               name="team_one_score"
                               class="form-control"
                               min="0"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">
                            {{ $match->teamTwo->team_name }}
                        </label>
                        <input type="number"
                               name="team_two_score"
                               class="form-control"
                               min="0"
                               required>
                    </div>
                </div>

                <button class="btn btn-primary">
                    Save Result
                </button>

                <a href="{{ route('tournaments.show', $match->tournament_id) }}"
                   class="btn btn-secondary">
                    Cancel
                </a>
            </form>

        </div>
    </div>

</div>
@endsection
