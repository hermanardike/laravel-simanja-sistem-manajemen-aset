<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
{
    protected $table = 'ipaddress';
    protected $fillable = [
        'ip_address',
        'ip_type',
        'id_network',
        'ip_details',
        'ip_status',
        'ip_owner',
        'ip_contact',
        'author',
    ];
    protected $primaryKey = 'id_ipaddress';
    use HasFactory;
}
