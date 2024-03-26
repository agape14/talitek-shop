<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable=['entidad','short_des','description','photo','address','phone','email','urlvideo','logo'];
}
