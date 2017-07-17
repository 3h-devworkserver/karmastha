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

    public function atrtibuteId(){
        return $this->belongsTo('\App\Models\Attribute\Attribute'); 
    }

    public function attribute(){
        return $this->belongsTo('App\Models\Attribute\Attribute');
    }



}
