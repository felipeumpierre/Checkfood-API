<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestsObservation extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['request_products_id', 'observation'];

    public function product()
    {
        return $this->hasOne('Products', 'id', 'products_id');
    }
}
