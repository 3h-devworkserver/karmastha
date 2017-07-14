<?php

namespace App\Models\Attribute;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attributes';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

    public function attributesValues(){
        return $this->hasMany('\App\Models\Attribute\AttributeValue');
    }

    public function attributesValuesWithOrder(){
        return $this->hasMany('\App\Models\Attribute\AttributeValue')->orderBy('value_order', 'asc');
    }

     /**
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->status == 1) {
            return "<label class='label label-success'>".'Enabled'.'</label>';
        }

        return "<label class='label label-danger'>".'Disabled'.'</label>';
    }


}
