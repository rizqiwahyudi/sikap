<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class CreateKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            [
                'major_id'  => 1,
                'kelas'     => 1,
                'sub_kelas' => 'A',
            ],
            [
                'major_id'  => 1,
                'kelas'     => 1,
                'sub_kelas' => 'B',
            ],
            [
                'major_id'  => 2,
                'kelas'     => 2,
                'sub_kelas' => 'A',
            ],
            [
                'major_id'  => 2,
                'kelas'     => 2,
                'sub_kelas' => 'B',
            ],
        ];

        foreach ($kelas as $value) {
            Kelas::create([
                'major_id'  => $value['major_id'],
                'kelas'     => $value['kelas'],
                'sub_kelas' => $value['sub_kelas'],
            ]);
        }
    }
}
