<?php

namespace App\Models\Access\User;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'profiles';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];



}
