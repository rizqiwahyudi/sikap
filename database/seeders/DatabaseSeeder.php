<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CreateRoleSeeder::class,
            PermissionTableSeeder::class,
            CreateAcademicYearSeeder::class,
            CreateMajorSeeder::class,
            CreateKelasSeeder::class,
            CreateGroupSeeder::class,
            CreateAdminUserSeeder::class,
            CreateUserSeeder::class,
        ]);
    }
}
