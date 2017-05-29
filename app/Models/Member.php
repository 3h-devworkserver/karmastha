<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'members';
    
    
    protected $fillable=
    		[
    			'Name',
    			'logo',
    			'url',
    			'm_order',
                'status',

    		];

}
