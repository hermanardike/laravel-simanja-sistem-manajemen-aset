<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ipaddress;

class IpaddressSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ipaddress::create([
            'ip_address' => '103.3.46.12',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);

        Ipaddress::create([
            'ip_address' => '103.3.46.1',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);

        Ipaddress::create([
            'ip_address' => '103.3.46.2',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '103.3.46.3',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '103.3.46.4',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '103.3.46.5',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '103.3.46.6',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '103.3.46.7',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '192.168.123.10',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);
        Ipaddress::create([
            'ip_address' => '192.168.123.11',
            'ip_type' => 'PUBLIC',
            'id_network' => 1,
            'ip_details' => 'www.example.com',
            'ip_status' => 'USED',
            'ip_owner' => 'bambang',
            'ip_contact' => '085274697892',
        ]);

    }
}
