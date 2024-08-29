<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_domain';
    protected $table = 'domain';
    protected $fillable = [
        'id_domain',
        'domain_name',
        'id_sub',
        'domain_type',
        'id_lokasi',
        'domain_ip',
        'domain_owner',
        'domain_kontak',
        'domain_email',
        'id_pengadaan',
        'upload_surat',
        'domain_keterangan',
        'domain_status',
        'author',
    ];

    public function location()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi', 'id_lokasi');
    }

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan', 'id_pengadaan');
    }

    public function subdomain()
    {
        return $this->belongsTo(Subdomain::class, 'id_sub', 'id');
    }
}
