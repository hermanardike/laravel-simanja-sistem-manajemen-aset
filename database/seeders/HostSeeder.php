<?php

namespace Database\Seeders;

use App\Models\Host;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Host::create([
            'host_name' => 'Host Server Siakadu',
            'id_os' => '1',
            'host_ip' => '192.168.123.87',
            'host_auth' => 'user : Password',
            'id_srv' => '1',
            'status' => 'Active',
            ]);

        Host::create([
            'host_name' => 'Host Server One Data',
            'id_os' => '2',
            'host_ip' => '192.168.123.88',
            'host_auth' => 'user : Password',
            'id_srv' => '2',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server My Unila',
            'id_os' => '3',
            'host_ip' => '192.168.123.89',
            'host_auth' => 'user : Password',
            'id_srv' => '3',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server APPS',
            'id_os' => '4',
            'host_ip' => '192.168.123.90',
            'host_auth' => 'user : Password',
            'id_srv' => '4',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server Muji',
            'id_os' => '5',
            'host_ip' => '192.168.123.91',
            'host_auth' => 'user : Password',
            'id_srv' => '5',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server Hendri',
            'id_os' => '1',
            'host_ip' => '192.168.123.92',
            'host_auth' => 'user : Password',
            'id_srv' => '6',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server Nyoman',
            'id_os' => '1',
            'host_ip' => '192.168.123.93',
            'host_auth' => 'user : Password',
            'id_srv' => '7',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server bambang',
            'id_os' => '2',
            'host_ip' => '192.168.123.94',
            'host_auth' => 'user : Password',
            'id_srv' => '8',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server Unila',
            'id_os' => '3',
            'host_ip' => '192.168.123.95',
            'host_auth' => 'user : Password',
            'id_srv' => '9',
            'status' => 'Active',
        ]);

        Host::create([
            'host_name' => 'Host Server FT',
            'id_os' => '4',
            'host_ip' => '192.168.123.96',
            'host_auth' => 'user : Password',
            'id_srv' => '10',
            'status' => 'Active',
        ]);

    }
}
