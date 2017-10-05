<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payments';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function paymentIpay(){
        return $this->hasOne('App\Models\Purchase\PaymentIpay');
    }


}
