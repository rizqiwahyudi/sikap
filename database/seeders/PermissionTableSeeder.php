<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'kp-list',
            'kp-create',
            'kp-edit',
            'kp-delete',
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'lecturer-list',
            'lecturer-create',
            'lecturer-edit',
            'lecturer-delete',
            'resultKp-list',
            'resultKp-create',
            'resultKp-edit',
            'resultKp-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
