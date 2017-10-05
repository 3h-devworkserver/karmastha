<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchase_items';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


}
