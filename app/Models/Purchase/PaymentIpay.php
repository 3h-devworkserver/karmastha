<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class PaymentIpay extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_ipay';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


}
