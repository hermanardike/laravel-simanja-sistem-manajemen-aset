<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Rack extends Model
{
    use HasFactory;
    protected $table = 'rack';
    protected $fillable = ['id_rack','rack_number'];
    protected $primaryKey = 'id_rack';

    public function server()
    {
        return $this->hasMany('id_rack');
    }
}
