<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staticblock extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'static_blocks';
    
    
    protected $fillable=
    		[
    			'title',
    			'identifier',
    			'url',
    			'content',
    			'bgcolor',
    			'bgimage',
    			'page',
    			'feature_image',
    			'status',
    			'position',
    			's_order',
    		];     
}
