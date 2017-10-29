<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_wishlist';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

    // public function product(){
    //     return $this->belongsTo('App\Models\Product\Product');
    // }

}
