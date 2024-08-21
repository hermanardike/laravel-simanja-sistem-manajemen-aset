<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdomain extends Model
{
    protected $table = 'subdomain';
    protected $primaryKey = 'id_sub';
    protected $fillable = [
        'id_sub',
        'subdomain_name',
    ];

    use HasFactory;
}
