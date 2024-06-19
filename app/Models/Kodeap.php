<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodeap extends Model
{
    use HasFactory;

    protected $table = 'kodeap';
    protected $primaryKey = 'id_kode';
    protected $fillable = ['kode_ap'];
}
