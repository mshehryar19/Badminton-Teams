@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Assign Roles to Users</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Email</th>
                <th>Current Role</th>
                <th>Assign Role</th>
            </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->roles->pluck('name')->join(', ') ?: 'None' }}</td>
                <td>
                    <form method="POST" action="/admin/users/{{ $user->id }}/assign-role">
                        @csrf
                        <select name="role" class="form-select">
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary btn-sm mt-1">
                            Assign
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
