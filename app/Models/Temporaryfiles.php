<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporaryfiles extends Model
{
    use HasFactory;

    protected $table = 'temporary_files';
    protected $primaryKey = 'id_tmp';

    protected $fillable = [
        'foldername',
        'filename'
    ];
}
