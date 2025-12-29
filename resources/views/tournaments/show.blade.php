@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $tournament->name }}</h2>
    <p>Status:
        <strong class="text-primary">{{ ucfirst($tournament->status) }}</strong>
    </p>

    @php
    $completedMatches = $tournament->matches->where('status', 'completed');
        @endphp

        @if($completedMatches->count() && $completedMatches->last()->winner)
            @if($completedMatches->count() === ($tournament->max_teams - 1))
                <div class="alert alert-success">
                    🏆 Champion:
                    <strong>{{ $completedMatches->last()->winner->team_name }}</strong>
                </div>
            @endif
@endif


    {{-- REGISTERED TEAMS --}}
        <div class="card mb-4">
            <div class="card-body">
                <h5>Registered Teams ({{ $registeredTeams->count() }})</h5>

                @if($registeredTeams->count())
                    <ul class="list-group">
                        @foreach($registeredTeams as $team)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $team->team_name }}</span>
                                <span class="badge bg-success">Registered</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted mb-0">
                        No teams registered yet.
                    </p>
                @endif
            </div>
        </div>


    {{-- REGISTER TEAMS --}}
    @if($tournament->status === 'upcoming')
    <div class="card mb-4">
        <div class="card-body">
            <h5>Register Teams</h5>

            @if($availableTeams->count())
                <form method="POST"
                      action="{{ route('tournaments.register', $tournament) }}">
                    @csrf

                    <select name="teams[]" multiple class="form-select" required>
                        @foreach($availableTeams as $team)
                            <option value="{{ $team->id }}">
                                {{ $team->team_name }}
                            </option>
                        @endforeach
                    </select>

                    <button class="btn btn-success mt-2">
                        Register Selected Teams
                    </button>
                </form>
            @else
                <p class="text-muted mb-0">
                    All teams are already registered.
                </p>
            @endif
        </div>
    </div>
@endif


    {{-- GENERATE MATCHES --}}
    @if($tournament->teams->count() == $tournament->max_teams
        && $tournament->status === 'upcoming')

        <form method="POST"
              action="{{ route('tournaments.generate', $tournament) }}">
            @csrf
            <button class="btn btn-danger mb-3">
                Generate Matches
            </button>
        </form>
    @endif

    {{-- MATCHES --}}
    <h4>Matches</h4>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Round</th>
                <th>Team One</th>
                <th>Team Two</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($tournament->matches as $match)
            <tr>
                <td>{{ $match->round }}</td>
                <td>{{ $match->teamOne->team_name }}</td>
                <td>{{ $match->teamTwo->team_name }}</td>
                <td>{{ ucfirst($match->status) }}</td>
                <td>
                    @if($match->status === 'scheduled')
                        <a href="{{ route('matches.score', $match) }}"
                           class="btn btn-sm btn-primary">
                            Enter Score
                        </a>
                    @else
                        Winner:
                        <strong>{{ $match->winner->team_name }}</strong>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    @if($tournament->matches->count())
        @php
            $latestRound = $tournament->matches->max('round');
            $roundMatches = $tournament->matches->where('round', $latestRound);
            $allCompleted = $roundMatches->every(fn($m) => $m->status === 'completed');
        @endphp

        @if($allCompleted && $roundMatches->count() > 1)
            <form method="POST"
                action="{{ route('tournaments.nextRound', $tournament) }}">
                @csrf
                <button class="btn btn-warning mt-3">
                    Generate Next Round
                </button>
            </form>
        @endif
    @endif

</div>
@endsection
