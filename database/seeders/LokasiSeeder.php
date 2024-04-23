<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create([
            'nama_lokasi' => 'FAKULTS TEKNIK'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS PERTANIAN'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS FMIPA'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS FKIP'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS KEDOKTERAN'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'GEDUNG TPS'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'KOLAM RENANG'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'REKTORAT KPA'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'PERPUSTAKAAN'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTLAS FISIP'
        ]);
        Lokasi::create([
            'nama_lokasi' => 'PERPUSTAKAAN'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS ILMU SOSIAL DAN POLITIK'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS HUKUM'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'FAKULTAS EKONOMI DAN BISNIS'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'UPT TIK'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'GEDUNG SERBA GUNA'
        ]);

        Lokasi::create([
            'nama_lokasi' => 'PERPUSTAKAAN'
        ]);
    }






}
