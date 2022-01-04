<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class CreateGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'name'          => 'Kelompok 1',
                'description'   => 'Mollit nisi enim consequat elit consequat consectetur minim do incididunt dolore. Mollit est elit aute eu incididunt. Laborum sunt ut anim voluptate voluptate tempor reprehenderit veniam fugiat officia consequat. Non magna anim incididunt sunt consectetur minim.'
            ],
            [
                'name'          => 'Kelompok 2',
                'description'   => 'Mollit nisi enim consequat elit consequat consectetur minim do incididunt dolore. Mollit est elit aute eu incididunt. Laborum sunt ut anim voluptate voluptate tempor reprehenderit veniam fugiat officia consequat. Non magna anim incididunt sunt consectetur minim.'
            ],
        ];

        foreach ($groups as $group) {
            Group::create([
                'name'          => $group['name'],
                'description'   => $group['description'],
            ]);
        }
    }
}
