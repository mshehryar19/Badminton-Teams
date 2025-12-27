@extends('layouts.app')

@section('content')

<h2>Teams</h2>

<a class="btn btn-primary mb-3" href="{{ route('teams.create') }}">Add Team</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
<tr>
<th>Team</th>
<th>Coach</th>
<th>Players</th>
<th>Actions</th>
</tr>

@foreach($teams as $team)
<tr>
<td>{{ $team->team_name }}</td>
<td>{{ $team->coach_name }}</td>
<td>{{ $team->player1_name }} , {{ $team->player2_name }}</td>
<td>
<a class="btn btn-sm btn-warning" href="{{ route('teams.edit', $team) }}">Edit</a>

<form class="d-inline" method="POST" action="{{ route('teams.destroy', $team) }}">
@csrf
@method('DELETE')
<button class="btn btn-sm btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>

@endsection
