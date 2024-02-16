<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

   protected $table = ['server'];

   protected $fillable = [
       'id_srv',
       'srv_name',
       'srv_ip',
       'srv_auth',
       'srv_spec',
       'srv_owner',
       'id_pengadaan',
       'id_host',
       'id_rack'
   ];
}
