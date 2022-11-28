<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    public function itens()
    {
        return $this->hasMany(App\Models\Registration\Item::class, 'id_item', 'id_group');
    }
}
