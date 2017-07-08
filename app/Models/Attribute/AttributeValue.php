<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_values';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];



}
