<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'slides';
    
    
    protected $fillable=
    		[
    			'title',
    			'caption',
    			'Slider_image',
    			'link',
                'group_identifier',
    		];
}
