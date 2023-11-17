<?php

namespace App\Models\Concierge;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'port002';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
