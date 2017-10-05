<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchases';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function payment(){
        return $this->hasOne('App\Models\Purchase\Payment');
    }

    public function purchaseItems(){
        return $this->hasMany('App\Models\Purchase\PurchaseItem');
    }


}
