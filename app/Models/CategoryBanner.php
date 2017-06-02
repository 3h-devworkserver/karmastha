<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryBanner extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_banner';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

   


}
