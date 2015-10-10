<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name'];
}
