<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Domain;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::create([
            'domain_name' => 'kucing',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.10',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);


        Domain::create([
            'domain_name' => 'kuda',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.11',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);




        Domain::create([
            'domain_name' => 'sapi',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.12',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);



        Domain::create([
            'domain_name' => 'ayam',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.13',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);


        Domain::create([
            'domain_name' => 'bebek',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.14',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);

        Domain::create([
            'domain_name' => 'kerbau',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.15',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);
        Domain::create([
            'domain_name' => 'serigala',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.16',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);
        Domain::create([
            'domain_name' => 'harimau',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.17',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);
        Domain::create([
            'domain_name' => 'sepeda',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.18',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);
        Domain::create([
            'domain_name' => 'semut',
            'id_sub' => '1',
            'domain_type' => 'aplikasi',
            'id_lokasi' => '1',
            'domain_ip' => '192.168.122.19',
            'domain_owner' => 'budi',
            'domain_kontak' => '0852467456',
            'domain_email' => 'kucing@gmail.com',
            'id_pengadaan' => '1',
            'domain_keterangan' => 'Domain ini digunakan untuk aplikasi kucing',
            'domain_status' => 'aktif',
        ]);



    }
}
