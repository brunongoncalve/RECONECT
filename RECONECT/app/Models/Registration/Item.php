<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'itens';

    public function group()
    {
        return $this->belongsTo('App\Models\Registration\Group', 'groups_id', 'id');
    }
}
