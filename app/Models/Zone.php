<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'zones';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

}
