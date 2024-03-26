<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCoins extends Model
{
    protected $table = 'type_coins';
    protected $fillable = [
        'id',
        'valor',
        'descripcion',
        'created_at',
        'updated_at'
    ];
}
