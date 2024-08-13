<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
    protected $table = 'cctv';
    protected $fillable = [
        'id_kodecctv',
        'cctv_number',
        'cctv_mac',
        'cctv_ip',
        'cctv_auth',
        'cctv_type',
        'id_lokasi',
        'cctv_lokasi',
        'id_vendor',
        'id_pengadaan',
        'cctv_keterangan',
        'cctv_status',
        'cctv_image',
        'cctv_backup',
        'cctv_author',
        ];
    protected $primaryKey = 'id_cctv';

    use HasFactory;
}
