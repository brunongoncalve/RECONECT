<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impression extends Model
{
    protected $table = 'print001s';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
