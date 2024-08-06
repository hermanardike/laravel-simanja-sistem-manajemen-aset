<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Router extends Model
{
    protected $table = 'router';
    protected $primaryKey = 'id_router ';
    protected $fillable = [
                            'r_router',
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
}
