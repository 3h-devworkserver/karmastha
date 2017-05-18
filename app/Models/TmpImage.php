<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TmpImage extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tmp_image';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
