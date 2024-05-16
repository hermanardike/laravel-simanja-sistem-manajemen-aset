<?php

namespace App\Models;

use Database\Seeders\VendorSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sw extends Model
{
    use HasFactory;

    protected $table = 'switch';
    protected $fillable = [
        'sw_name',
        'sw_ip',
        'sw_auth',
        'sw_uplink',
        'id_lokasi',
        'sw_lokasi',
        'id_vendor',
        'id_pengadaan',
        'sw_keterangan',
        'image',
        'sw_status',
        'sw_backup',
        'sw_author',
    ];

    protected $primaryKey = 'id_switch';


    public function location()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan', 'id_pengadaan');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'id_vendor', 'id_vendor');
    }
}
