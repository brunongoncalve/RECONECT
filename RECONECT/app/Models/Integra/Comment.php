<?php

namespace App\Models\Integra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'rep004s';
    protected $primaryKey = 'id';

    public function userComment()
    {
        return $this->belongsTo('App\Models\User','users_id','id');  
    }
}
