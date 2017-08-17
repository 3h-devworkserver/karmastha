<?php

namespace App\Models\ProductGroup;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productgroups';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

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