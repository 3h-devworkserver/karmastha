<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function productPrice(){
        return $this->hasOne('App\Models\Product\ProductPrice');
    }

    public function productInventory(){
        return $this->hasOne('App\Models\Product\ProductInventory');
    }

    public function productAttributes(){
        return $this->hasMany('App\Models\Product\ProductAttribute', 'product_id');
    }

    public function productAttributesWithOrder(){
        return $this->hasMany('App\Models\Product\ProductAttribute', 'product_id')->orderBy('attr_order');
    }

    public function categorys(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function gallerys(){
        return $this->hasMany('App\Models\Product\ProductGallery');
    }

    public function galleryswithOrder(){
        return $this->hasMany('App\Models\Product\ProductGallery')->orderBy('image_order');
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

    /**
     * @return string
     */
    public function getFeaturedLabelAttribute()
    {
        if ($this->status == 1) {
            return "<label class='label label-success'>".'Yes'.'</label>';
        }

        return "<label class='label label-danger'>".'No'.'</label>';
    }

}
