<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor';
    protected $fillable = [
        'nama_vendor'
    ];
    protected $primaryKey = 'id_vendor';
    use HasFactory;

    public function sw()
    {
        return $this->hasMany(Sw::class, 'id_vendor');
    }
}
