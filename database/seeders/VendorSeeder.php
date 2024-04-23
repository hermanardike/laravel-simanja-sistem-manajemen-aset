<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Vendor::create([
            'nama_vendor' => 'UNIFI',
        ]);
        Vendor::create([
            'nama_vendor' => 'ARUBA',
        ]);

        Vendor::create([
            'nama_vendor' => 'CISCO',
        ]);

        Vendor::create([
            'nama_vendor' => 'ALCATEL-LUCENT',
        ]);

        Vendor::create([
            'nama_vendor' => 'TENDA',
        ]);

    }
}
