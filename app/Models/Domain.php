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
}
