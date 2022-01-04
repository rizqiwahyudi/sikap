<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username'  => 'student',
            'email'     => 'student@gmail.com',
            'password'  => bcrypt('student12345'),
        ]);

        $role           = Role::where('name', 'student')->first();
        $permissions    = Permission::pluck('id','id')->all();

        $role->givePermissionTo([$permissions]);
        $user->assignRole([$role->id]);

        $student = Student::create([
            'user_id'           => $user->id,
            'name'              => 'Student User',
            'nrp'               => 1234567890,
            'academic_year_id'  => 1,
            'major_id'          => 1,
            'kelas_id'          => 3,
            'group_id'          => null,
        ]);


        $user = User::create([
            'username'  => 'lecturer',
            'email'     => 'lecturer@gmail.com',
            'password'  => bcrypt('lecturer12345'),
        ]);

        $role           = Role::where('name', 'lecturer')->first();
        $permissions    = Permission::pluck('id','id')->all();

        $role->givePermissionTo([$permissions]);
        $user->assignRole([$role->id]);

        $lecturer = Lecturer::create([
            'user_id'   => $user->id,
            'name'      => 'Lecturer User',
            'nip'       => 1234567890,
        ]);
    }
}
