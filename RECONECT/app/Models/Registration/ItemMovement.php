<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMovement extends Model
{
    protected $table = 'itens001';

    public function itemOut()
    {
        return $this->belongsTo('App\Models\Registration\Item', 'id_item', 'id');
    }
}
