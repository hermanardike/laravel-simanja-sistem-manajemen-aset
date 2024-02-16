<?php

namespace Database\Seeders;

use App\Models\Pengadaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengadaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Pengadaan::factory(10)->create();

        Pengadaan::create([
            'thn_pengadaan' => '2012',
        ]);

        Pengadaan::create([
            'thn_pengadaan' => '2013',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2014',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2015',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2016',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2017',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2018',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2019',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2020',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2021',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2022',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2023',
        ]);
        Pengadaan::create([
            'thn_pengadaan' => '2024',
        ]);


    }
}
