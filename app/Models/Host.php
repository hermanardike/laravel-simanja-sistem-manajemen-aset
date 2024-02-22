<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 */
class Host extends Model
{
    use HasFactory;
    protected $table = 'hosts';
    protected $fillable = [
        'id_host',
        'host_name',
        'host_version',
        'host_ip',
        'host_auth',
        'id_srv',
        'status'
    ];
    protected $primaryKey = 'id_host';

    public function server()
    {
        return $this->belongsTo(Server::class, 'id_srv', 'id_srv');
    }



}
