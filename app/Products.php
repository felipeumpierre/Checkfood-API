<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['categories_id', 'name', 'description', 'price', 'stock'];

    public function category()
    {
        return $this->hasOne('Categories', 'id', 'categories_id');
    }
}