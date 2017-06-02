<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';
    
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

    public function topStaticBlock(){
        return $this->hasMany('App\Models\Staticblock', 'page')->where('position', 0)->where('status', 1)->orderBy('s_order', 'asc');
    }

    public function bottomStaticBlock(){
        return $this->hasMany('App\Models\Staticblock', 'page')->where('position', 1)->where('status', 1)->orderBy('s_order', 'asc');
    }


}
