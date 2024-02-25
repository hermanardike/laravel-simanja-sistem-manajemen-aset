<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instance;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.124',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',
                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '1',
                'id_host' => '1',
            ]);

        Instance::create(
            [
                'instance_name' => 'Windows pro',
                'instance_ip' => '192.168.123.125',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '1',
                'id_host' => '1',
            ]);

        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.126',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '2',
                'id_host' => '2',
            ]);


        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.127',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '3',
                'id_host' => '2',
            ]);

        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.128',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '4',
                'id_host' => '5',
            ]);
        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.129',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '1',
                'id_host' => '3',
            ]);
        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.130',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '4',
                'id_host' => '2',
            ]);
        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.131',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '4',
                'id_host' => '3',
            ]);
        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.134',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '4',
                'id_host' => '2',
            ]);
        Instance::create(
            [
                'instance_name' => 'VM-Ubuntu',
                'instance_ip' => '192.168.123.112',
                'instance_auth' => 'user : PASSWORD',
                'instance_spec' => 'Processor: 1 gigahertz (GHz) or faster processor or SoC
                                    RAM: 1 gigabyte (GB) for 32-bit or 2 GB for 64-bit
                                    Hard disk space: 16 GB for 32-bit OS or 20 GB for 64-bit OS
                                    Graphics card: DirectX 9 or later with WDDM 1.0 driver
                                    Display: 800 x 600',

                'instance_owner' => 'Herman Ardike',
                'instance_domain'=> 'www.example.com',
                'instance_status' => 'Active',
                'instance_keterangan' =>    'Sebagaimana yang ditulis dalam dokumen tersebut “If you are a decision maker purchasing new devices and
                                            you want to enable the best possible security configuration,
                                            your device should meet or exceed these standards.” ',
                'id_os' => '3',
                'id_host' => '6',
            ]);



    }
}
