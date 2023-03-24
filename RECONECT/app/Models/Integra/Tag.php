<?php

namespace App\Models\Integra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'rep002s';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
