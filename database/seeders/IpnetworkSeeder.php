<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ipnetwork;

class IpnetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ipnetwork::create([
            'network' => 'NET-103',
            'vlan' => 'VLAN-100',
            'description' => 'Network IP Public',
        ]);
        Ipnetwork::create([
            'network' => 'NET-121',
            'vlan' => 'VLAN-100',
            'description' => 'Network IP Public',

        ]);
        Ipnetwork::create([
            'network' => 'NET-123',
            'vlan' => 'VLAN-100',
            'description' => 'Network IP Public',
        ]);
        Ipnetwork::create([
            'network' => 'NET-220',
            'vlan' => 'VLAN-100',
            'description' => 'Network IP Public',
        ]);
        Ipnetwork::create([
            'network' => 'NET-111',
            'vlan' => 'VLAN-100',
            'description' => 'Network IP Public',
        ]);
        Ipnetwork::create([
            'network' => 'NET-112',
            'vlan' => 'VLAN-100',
            'description' => 'Network IP Public',
        ]);

    }
}
