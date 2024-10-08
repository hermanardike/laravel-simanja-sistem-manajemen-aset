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
    public function kodecctv()
    {
        return $this->belongsTo(Kodecctv::class, 'id_kodecctv', 'id_kodecctv');
    }


}

