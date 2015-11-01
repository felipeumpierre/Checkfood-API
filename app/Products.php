<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'file_upload_id', 'categories_id', 'stock'];

    /**
     * @var array
     */
    protected $fillable = ['categories_id', 'file_upload_id', 'name', 'description', 'price', 'stock'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Categories', 'categories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fileUpload()
    {
        return $this->belongsTo('App\FileUpload', 'file_upload_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredients', 'products_ingredients')->withTimestamps();
    }
}