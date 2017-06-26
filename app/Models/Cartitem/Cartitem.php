<?php

namespace App\Models\Cartitem;

use Illuminate\Database\Eloquent\Model;

class Cartitem extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cartitems';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    

    public function attributes(){
        return $this->hasMany('App\Models\Cartitem\CartitemAttribute');
    }

    


}
