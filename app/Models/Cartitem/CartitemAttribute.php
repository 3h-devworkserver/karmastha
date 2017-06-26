<?php

namespace App\Models\Cartitem;

use Illuminate\Database\Eloquent\Model;

class CartitemAttribute extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cartitem_attribute';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    


}
