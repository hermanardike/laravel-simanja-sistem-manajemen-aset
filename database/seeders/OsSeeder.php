<?php

namespace Database\Seeders;

use App\Models\Os;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Os::create([
            'os_name' => 'Vmware EXSI 7'
        ]);

        Os::create([
            'os_name' => 'Vmware EXSI 6'
        ]);
        Os::create([
            'os_name' => 'Vmware EXSI 5'
        ]);

        Os::create([
            'os_name' => 'Proxmos Server'
        ]);

        Os::create([
            'os_name' => 'Windows Server'
        ]);


        Os::create([
            'os_name' => 'Linux Server'
        ]);

    }
}
