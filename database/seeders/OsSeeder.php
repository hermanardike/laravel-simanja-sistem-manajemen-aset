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
            'os_name' => 'Vmware EXSI 8',
            'os_type' => 'vmware'
        ]);

        Os::create([
            'os_name' => 'Vmware EXSI 7',
            'os_type' => 'vmware'
        ]);

        Os::create([
            'os_name' => 'Vmware EXSI 6',
            'os_type' => 'vmware'
        ]);

        Os::create([
            'os_name' => 'Vmware EXSI 5',
            'os_type' => 'vmware'
        ]);

        Os::create([
            'os_name' => 'Windows Server 2012',
            'os_type' => 'windows'
        ]);

        Os::create([
            'os_name' => 'Windows Server 2016',
            'os_type' => 'windows'
        ]);

        Os::create([
            'os_name' => 'Windows Server 2019',
            'os_type' => 'windows'
        ]);

        Os::create([
            'os_name' => 'Windows Server 2022',
            'os_type' => 'windows'
        ]);


        Os::create([
            'os_name' => 'Ubuntu Server 20.04',
            'os_type' => 'linux'
        ]);

        Os::create([
            'os_name' => 'Ubuntu Server 18.04',
            'os_type' => 'linux'
        ]);

        Os::create([
            'os_name' => 'Ubuntu Server 16.04',
            'os_type' => 'linux'
        ]);

        Os::create([
            'os_name' => 'Ubuntu Server 12.04',
            'os_type' => 'linux'
        ]);
    }
}
