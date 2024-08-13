<?php

namespace Database\Seeders;

use App\Models\Kodecctv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KodecctvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kodecctv::create([
                'cctv_code' => '20CAM',
        ]);

        Kodecctv::create([
            'cctv_code' => '21CAM',
        ]);

        Kodecctv::create([
            'cctv_code' => '22CAM',
        ]);
        Kodecctv::create([
            'cctv_code' => '23CAM',
        ]);
        Kodecctv::create([
            'cctv_code' => '24CAM',
        ]);

    }
}
