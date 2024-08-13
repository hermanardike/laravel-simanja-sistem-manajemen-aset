<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $table = 'router';
    protected $primaryKey = 'id_router';
    protected $fillable = [
        'r_name',
        'r_ip',
        'r_auth',
        'id_lokasi',
        'r_lokasi',
        'id_vendor',
        'id_pengadaan',
        'r_keterangan',
        'r_status',
        'r_image',
        'r_backup',
        'r_author',
    ];
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

}


