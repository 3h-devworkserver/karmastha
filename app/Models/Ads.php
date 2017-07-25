<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ads';
    
    
    protected $fillable=
    		[
    			'first_image',
    			'second_image',
                'third_image',
                'fourth_image',
    			'fifth_image',
                'created_at',
                'updated_at',
    		];

    

}
