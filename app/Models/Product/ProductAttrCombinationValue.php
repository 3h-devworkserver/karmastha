<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductAttrCombinationValue extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_attr_combination_value';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function atrributeVal(){
        return $this->belongsTo('App\Models\Attribute\AttributeValue', 'attribute_value_id');
    }
}
