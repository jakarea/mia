<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'title'
    	,'category'
    	,'partner'
    	,'description'
    	,'status'
    	,'featured'
    	,'price'
    	,'discount'
        ,'file'
    ];
}