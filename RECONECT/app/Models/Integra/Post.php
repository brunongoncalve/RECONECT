<?php

namespace App\Models\Integra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'rep001';
    protected $primaryKey = 'id';

    public function userPost()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
