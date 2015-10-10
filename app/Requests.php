<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['status_id', 'boards_id'];

    public function board()
    {
        return $this->belongsTo('App\Boards', 'boards_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Products', 'requests_products')->withTimestamps();
    }
}
