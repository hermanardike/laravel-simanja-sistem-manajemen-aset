<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Server::create([
            'srv_name' => 'Server Dell Core',
            'srv_ip' => '192.168.1.1',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '1',
            'id_rack' => '1',
        ]);

        Server::create([
            'srv_name' => 'Lenovo',
            'srv_ip' => '192.168.1.2',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '1',
            'id_rack' => '1',
        ]);

        Server::create([
            'srv_name' => 'Server HP',
            'srv_ip' => '192.168.1.3',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '2',
            'id_rack' => '2',
        ]);


        Server::create([
            'srv_name' => 'Server Dell Core',
            'srv_ip' => '192.168.1.4',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '3',
            'id_rack' => '3',
        ]);


        Server::create([
            'srv_name' => 'Dell R 760',
            'srv_ip' => '192.168.1.5',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '4',
            'id_rack' => '4',
        ]);

        Server::create([
            'srv_name' => 'Lenovo 70',
            'srv_ip' => '192.168.1.6',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '5',
            'id_rack' => '5',
        ]);


        Server::create([
            'srv_name' => 'HP Server',
            'srv_ip' => '192.168.1.7',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '1',
            'id_rack' => '1',
        ]);

        Server::create([
            'srv_name' => 'Lenovo 19',
            'srv_ip' => '192.168.1.8',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '2',
            'id_rack' => '2',
        ]);

        Server::create([
            'srv_name' => 'Dell Server T441',
            'srv_ip' => '192.168.1.9',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '3',
            'id_rack' => '3',
        ]);


        Server::create([
            'srv_name' => 'Server Dell 32',
            'srv_ip' => '192.168.1.10',
            'srv_auth' => 'user/password',
            'srv_spec' => 'Intel(R) Xeon(R) CPU E5-4627 v2 @ 3.30GHz x 4 CPU, RAM 256GB,  SAS RAID 1 300G ',
            'srv_owner' => 'andi',
            'id_pengadaan' => '4',
            'id_rack' => '4',
        ]);



    }
}
