<?php

namespace App\Models\Integra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'rep003s';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function userLike()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
