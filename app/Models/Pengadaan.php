<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaan';
    protected $fillable = ['id_pengadaan', 'thn_pengadaan'];

    public function server()
    {
        return $this->hasMany('id_pengadaan');
    }

}
