<?php

namespace App\Models\Ordinance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'port001';
    protected $primaryKey = 'id';

    public function managerCar()
    {
		  return $this->belongsTo('App\Models\User', 'id', 'id');
    }

    public function responsibleOrdinanca()
    {
      return $this->belongsTo('App\models\User', 'id', 'id');
    }
}
