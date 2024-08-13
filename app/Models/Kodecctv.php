<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kodecctv extends Model
{
    protected $table = 'kodecctv';
    protected $fillable = [
        'cctv_code',
        'author',
    ];
    protected $primaryKey = 'id_kodecctv';
    use HasFactory;
}
