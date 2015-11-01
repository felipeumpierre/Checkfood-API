<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    /**
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $fillable = ['name'];
}
