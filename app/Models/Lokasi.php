<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';
    protected $fillable = ['nama_lokasi'];
    protected $primaryKey = 'id_lokasi';
    use HasFactory;

    public function sw()
    {
        return $this->hasMany(Sw::class, 'id_lokasi');
    }

}
