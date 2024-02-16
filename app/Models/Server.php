<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Server extends Model
{
    use HasFactory;

   protected $fillable = [
       'srv_name',
       'srv_ip',
       'srv_auth',
       'srv_spec',
       'srv_owner',
       'id_pengadaan',
       'id_rack'
   ];


}
