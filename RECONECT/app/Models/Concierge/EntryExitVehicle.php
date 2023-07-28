<?php

namespace App\Models\Concierge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryExitVehicle extends Model
{
    protected $table = 'port001';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
