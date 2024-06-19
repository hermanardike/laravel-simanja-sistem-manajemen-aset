<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accespoint;

class AccespointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accespoint::create([
            'id_kode' => '1',
            'ap_number' => '30',
            'ap_mac' => '00:00:00:00:00:00',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);

        Accespoint::create([
            'id_kode' => '2',
            'ap_number' => '33',
            'ap_mac' => '00:00:00:00:00:01',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);

        Accespoint::create([
            'id_kode' => '3',
            'ap_number' => '34',
            'ap_mac' => '00:00:00:00:00:03',
            'id_lokasi' => '2',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);

        Accespoint::create([
            'id_kode' => '4',
            'ap_number' => '36',
            'ap_mac' => '00:00:00:00:00:43',
            'id_lokasi' => '6',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);

        Accespoint::create([
            'id_kode' => '8',
            'ap_number' => '38',
            'ap_mac' => '00:00:00:00:00:08',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);

        Accespoint::create([
            'id_kode' => '9',
            'ap_number' => '39',
            'ap_mac' => '00:00:00:00:00:09',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);
        Accespoint::create([
            'id_kode' => '10',
            'ap_number' => '65',
            'ap_mac' => '00:00:00:00:00:90',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);
        Accespoint::create([
            'id_kode' => '12',
            'ap_number' => '123',
            'ap_mac' => '00:00:00:00:00:012',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);
        Accespoint::create([
            'id_kode' => '14',
            'ap_number' => '112',
            'ap_mac' => '00:00:00:00:00:37',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);
        Accespoint::create([
            'id_kode' => '90',
            'ap_number' => '12',
            'ap_mac' => '00:00:00:00:00:976',
            'id_lokasi' => '1',
            'ap_lokasi' => 'UnDeployed',
            'id_vendor' => '1',
            'id_pengadaan' => '1',
            'ap_image' => 'default.jpg',
            'ap_status' => 'Aktif',
            'ap_keterangan' => 'Access Point ini belum di deploy',
            'ap_author' => 'Admin'
        ]);

    }
}
