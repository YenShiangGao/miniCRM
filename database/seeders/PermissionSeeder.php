<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::MANAGE_USERS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_PROJECTS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_CLIENTS->value]);
        Permission::create(['name' => PermissionEnum::DELETE_TASKS->value]);

        // Adding permissions via a role
        $role = Role::findByName(RoleEnum::ADMIN->value);

        $role->givePermissionTo([
            PermissionEnum::MANAGE_USERS->value,
            PermissionEnum::DELETE_PROJECTS,
            PermissionEnum::DELETE_CLIENTS,
            PermissionEnum::DELETE_TASKS,
        ]);
    }
}
