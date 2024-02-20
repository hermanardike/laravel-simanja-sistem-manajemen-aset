<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static paginate(int $int)
 */
class Server extends Model
{
    use HasFactory;
    protected $table ='servers';
    protected $fillable = [
        'id_srv',
        'srv_name',
        'srv_ip',
        'srv_auth',
        'srv_spec',
        'srv_owner',
        'srv_status',
        'srv_keterangan',
        'id_pengadaan',
        'id_rack'
    ];
    protected $primaryKey = 'id_srv';
    public function pengadaan(){
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan','id_pengadaan');
    }

    public function rack(){
        return $this->belongsTo(Rack::class, 'id_rack','id_rack');
    }




}
