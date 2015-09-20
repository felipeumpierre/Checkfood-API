<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boards extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['number'];
}
