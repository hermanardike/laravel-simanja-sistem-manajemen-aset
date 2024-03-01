<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Os extends Model
{
    use HasFactory;

    protected $table = 'os';
    protected $fillable = ['id_os','os_name','os_type'];
    protected $primaryKey = 'id_os';

  public function host()
  {
      return $this->hasMany(Host::class, 'id_os', 'id_os');
  }

  public function instance(){
      return $this->hasMany(Instance::class, 'id_os', 'id_os');
  }

}
