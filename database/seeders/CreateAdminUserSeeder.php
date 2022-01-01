<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('admin12345'),
        ]);

        $role = Role::where('name', 'admin')->first();

        $permissions = Permission::pluck('id','id')->all();

        $role->givePermissionTo([$permissions]);

        $user->assignRole([$role->id]);
    }
}
