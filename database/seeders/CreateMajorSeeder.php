<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class CreateMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            [
                'name'          => 'Teknik Informatika',
                'description'   => 'Cupidatat veniam consequat officia Lorem veniam. Anim anim velit sit qui consectetur reprehenderit ex nulla excepteur pariatur. Ut in sint nostrud aute tempor veniam minim aliquip irure voluptate ex culpa officia nisi. Aute officia elit occaecat ad consequat elit. Ipsum laborum pariatur reprehenderit cupidatat ex cupidatat mollit minim anim nostrud elit anim incididunt eiusmod. Consectetur ea est occaecat adipisicing veniam. Laborum nulla commodo amet nulla sunt laborum enim ut ea ipsum.',
                
            ],
            [
                'name'          => 'Teknologi Multimedia Broadcasting',
                'description'   => 'Cupidatat veniam consequat officia Lorem veniam. Anim anim velit sit qui consectetur reprehenderit ex nulla excepteur pariatur. Ut in sint nostrud aute tempor veniam minim aliquip irure voluptate ex culpa officia nisi. Aute officia elit occaecat ad consequat elit. Ipsum laborum pariatur reprehenderit cupidatat ex cupidatat mollit minim anim nostrud elit anim incididunt eiusmod. Consectetur ea est occaecat adipisicing veniam. Laborum nulla commodo amet nulla sunt laborum enim ut ea ipsum.',
            ],
        ];

        foreach ($majors as $major) {
            Major::create([
                'name' => $major['name'], 
                'description' => $major['description']
            ]);
        }
    }
}
