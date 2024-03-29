<?php

namespace App\Models\Integra;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'rep001s';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function userPost()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function tagPost()
    {
        return $this->belongsTo('App\Models\Integra\Tag', 'rep002s_id', 'id');
    }

    public function likePost()
    {
        return $this->hasMany('App\Models\Integra\like', 'rep001s_id', 'id');
    }

    public function commentPost()
    {
        return $this->hasMany('App\Models\Integra\Comment','rep001s_id','id');
    }
}
