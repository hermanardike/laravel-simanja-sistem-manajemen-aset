<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    use HasFactory;

    protected $table = 'instance';
    protected $fillable = [
        'id_instance',
        'instance_name',
        'instance_ip',
        'instance_auth',
        'instance_spec',
        'instance_owner',
        'instance_domain',
        'instance_status',
        'instance_keterangan',
        'id_os',
        'id_host',
        'author',
        ];

    protected $primaryKey = 'id_instance';

    public function os(){
        return $this->belongsTo(Os::class, 'id_os', 'id_os');
    }

    public function host(){
        return $this->belongsTo(Host::class, 'id_host', 'id_host');
    }

}
