<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductInventory extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_inventory';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
