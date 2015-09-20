<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsIngredients extends Model
{
    public function products()
    {
        return $this->hasMany('Products', 'id', 'products_id');
    }

    public function ingredients()
    {
        return $this->hasMany('Ingredients', 'id', 'ingredients_id');
    }
}
