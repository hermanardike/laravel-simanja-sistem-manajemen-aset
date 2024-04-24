<?php

namespace App\Models;

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
        'sw_image',
        'sw_status',
        'sw_backup',
    ];

    protected $primaryKey = 'id_switch';
}
