<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $team  = Role::firstOrCreate(['name' => 'team']);

        $permissions = [
            'manage teams',
            'manage tournaments',
            'view tournament',
            'view team progress',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $admin->givePermissionTo(Permission::all());
        $team->givePermissionTo([
            'view tournament',
            'view team progress',
        ]);
    }
}
