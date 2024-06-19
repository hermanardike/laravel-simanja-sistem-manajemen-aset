<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accespoint extends Model
{
    use HasFactory;

    protected $table = 'accespoint';
    protected $primaryKey = 'id_ap';
    protected $fillable = [
        'id_kode',
        'ap_number',
        'ap_mac',
        'id_lokasi',
        'ap_lokasi',
        'id_vendor',
        'id_pengadaan',
        'ap_image',
        'ap_status',
        'ap_keterangan',
        'ap_author'
    ];

}
