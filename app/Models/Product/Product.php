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

    public function productGroups(){
        return $this->belongsToMany('App\Models\ProductGroup\ProductGroup', 'product_productgroup', 'product_id', 'productgroup_id');
    }

    public function productInventory(){
        return $this->hasOne('App\Models\Product\ProductInventory');
    }

    // public function productAttributes(){
    //     return $this->hasMany('App\Models\Product\ProductAttribute', 'product_id');
    // }

    // public function productAttributesWithOrder(){
    //     return $this->hasMany('App\Models\Product\ProductAttribute', 'product_id')->orderBy('attr_order');
    // }

    public function categorys(){
        return $this->belongsToMany('App\Models\Category');
    }

    public function gallerys(){
        return $this->hasMany('App\Models\Product\ProductGallery');
    }

    public function galleryswithOrder(){
        return $this->hasMany('App\Models\Product\ProductGallery')->orderBy('image_order');
    }

    public function productListImage(){
        return $this->hasMany('App\Models\Product\ProductGallery')->where('small_image', 1)->orderBy('image_order');
    }

    public function productFirstListImage(){
        $image = $this->productListImage;
        if (count($image) == 0) {
            return "empty";
        }else{
            return $image[0]->image;
        }
    }



    public function productBaseImage(){
        return $this->hasMany('App\Models\Product\ProductGallery')->where('base_image', 1)->orderBy('image_order');
    }

    public function productThumbnailImage(){
        return $this->hasMany('App\Models\Product\ProductGallery')->where('thumbnail', 1)->orderBy('image_order');
    }

public function productFirstThumbImage(){
        $image = $this->productThumbnailImage;
        if (count($image) == 0) {
            return "empty";
        }else{
            return $image[0]->image;
        }
    }

    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }

    public function user(){
        return $this->belongsTo('App\Models\Access\User\User');
    }

    public function productAttrCombination(){
        return $this->hasMany('App\Models\Product\ProductAttrCombination');
    }

    public function increaseView(){
        $product = $this;
        $views = $product->total_views;
        $product->total_views = ++$views;
        $product->save();

        foreach($product->categorys as $cat){
            $views = $cat->total_views;
            $cat->total_views = ++$views;
            $cat->save();
        }
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
