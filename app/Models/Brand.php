<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';
    
    
    protected $fillable=
    		[
    			'brand_name',
    			'brand_logo',
                'slug',
    			'description',
                'b_order',
                'topbrand',
    			'status',
                'category',
    		];

    public function categorys(){
        return $this->belongsToMany('App\Models\Category');
    }

}
