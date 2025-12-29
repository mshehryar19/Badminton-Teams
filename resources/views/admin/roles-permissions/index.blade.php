@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Roles & Permissions</h2>

    {{-- CREATE ROLE --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5>Create Role</h5>
            <form method="POST" action="/admin/roles">
                @csrf
                <input name="role_name" class="form-control mb-2" placeholder="Role name">
                <button class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>

    {{-- CREATE PERMISSION --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5>Create Permission</h5>
            <form method="POST" action="/admin/permissions">
                @csrf
                <input name="permission_name" class="form-control mb-2" placeholder="Permission name">
                <button class="btn btn-secondary">Add Permission</button>
            </form>
        </div>
    </div>

    {{-- ROLES LIST --}}
    <div class="row">
        @foreach($roles as $role)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <strong>{{ $role->name }}</strong>
                        <form method="POST" action="/admin/roles/{{ $role->id }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="/admin/roles/{{ $role->id }}/permissions">
                            @csrf

                            @foreach($permissions as $permission)
                                <div>
                                    <label>
                                        <input type="checkbox" name="permissions[]"
                                            value="{{ $permission->name }}"
                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach

                            <button class="btn btn-success btn-sm mt-2">
                                Update Permissions
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
