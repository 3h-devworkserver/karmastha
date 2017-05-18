<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_price';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    
}
