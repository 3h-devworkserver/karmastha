<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductAttrCombination extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_attr_combination';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function productAttrCombinationValue(){
        return $this->hasMany('App\Models\Product\ProductAttrCombinationValue');
    }


}
