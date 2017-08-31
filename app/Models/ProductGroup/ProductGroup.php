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
    private $limit = 15;
    private $trendingLimit = 8;

    public function products(){
        return $this->belongsToMany('App\Models\Product\Product', 'product_productgroup', 'productgroup_id', 'product_id')->orderBy('total_views', 'desc');
    }

    public function productsLimit(){
        return $this->belongsToMany('App\Models\Product\Product', 'product_productgroup', 'productgroup_id', 'product_id')->orderBy('total_views', 'desc')->limit($this->limit);
    }

    public function trendingProductsLimit(){
        return $this->belongsToMany('App\Models\Product\Product', 'product_productgroup', 'productgroup_id', 'product_id')->orderBy('total_views', 'desc')->limit($this->trendingLimit);
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
