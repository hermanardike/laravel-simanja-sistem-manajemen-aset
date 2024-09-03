<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipnetwork extends Model
{
    protected $table = 'ipnetwork';
    protected $fillable = [
        'network',
        'vlan',
        'description',
        'author',
    ];
    protected $primaryKey = 'id_network';
    use HasFactory;
}
