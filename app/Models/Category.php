<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
protected $table = 'categorys';
private $productLimit = 15;
private $childLimit = 4;

public static function getRelatedSearchLimit(){
	return  5;
}

	// Recursive function that builds the menu from an array or object of items
	// In a perfect world some parts of this function would be in a custom Macro or a View
	public function buildMenu($menu, $parentid = 0) 
	{ 
	  $result = null;
	  foreach ($menu as $item) 
	    if ($item->parent_id == $parentid) { 
	    	if ($item->status == 1) {
	    		$result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
		        <div class='dd-handle nested-list-handle'>
		        	<span class='glyphicon glyphicon-move'></span>
		        </div>
		        <div class='nested-list-content'>{$item->title} 
		        	<div class='pull-right'>
			          <span class='label label-success'>Enabled</span><a href='".url("admin/category/edit/{$item->id}")."'> Edit</a> |
			          <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
		        	</div>
		        </div>".$this->buildMenu($menu, $item->id) . "</li>"; 
	    	}else{
	    		$result .= "<li class='dd-item nested-list-item' data-order='{$item->order}' data-id='{$item->id}'>
		        <div class='dd-handle nested-list-handle'>
		        	<span class='glyphicon glyphicon-move'></span>
		        </div>
		        <div class='nested-list-content'>{$item->title} 
		        	<div class='pull-right'>
			          <span class='label label-danger'>Disabled</span><a href='".url("admin/category/edit/{$item->id}")."'> Edit</a> |
			          <a href='#' class='delete_toggle' rel='{$item->id}'>Delete</a>
		        	</div>
		        </div>".$this->buildMenu($menu, $item->id) . "</li>"; 
	    	}
 
	    } 
	  return $result ?  "\n<ol class=\"dd-list\">\n$result</ol>\n" : null; 
	} 

	// Getter for the HTML menu builder
	public function getHTML($items)
	{
		return $this->buildMenu($items);
	}

	public function childs(){
		return $this->hasMany('App\Models\Category', 'parent_id', 'id')->where('status', 1);
	}

	public function childsWithOrder(){
		return $this->hasMany('App\Models\Category', 'parent_id', 'id')->where('status', 1)->orderBy('total_views', 'desc');
	}

	public function childsLimitWithOrder(){
		return $this->hasMany('App\Models\Category', 'parent_id', 'id')->where('status', 1)->orderBy('total_views', 'desc')->limit($this->childLimit);
	}

	public function topChilds(){
		return $this->hasMany('App\Models\Category', 'parent_id', 'id')->where('status', 1)->where('cat_type', 'top');
	}

	public function moreChilds(){
		return $this->hasMany('App\Models\Category', 'parent_id', 'id')->where('status', 1)->where('cat_type', 'more');
	}

	public function banners(){
		return $this->hasMany('App\Models\CategoryBanner');
	}

	public function topBanners(){
		return $this->hasMany('App\Models\CategoryBanner')->where('banner_position', 'top')->orderBy('banner_order', 'asc');
	}
	public function middleBanners(){
		return $this->hasMany('App\Models\CategoryBanner')->where('banner_position', 'middle')->orderBy('banner_order', 'asc');
	}

	public function brands(){
        return $this->belongsToMany('App\Models\Brand')->where('status', 1)->orderBy('b_order', 'asc');
    }

	public function topBrands(){
        return $this->belongsToMany('App\Models\Brand')->where('topbrand', 1)->where('status', 1)->orderBy('b_order', 'asc');
    }

    public function isParent(){
    	return ($this->parent_id == 0) ? 'true': 'false';
    }

    public function immediateParent(){
    	return $this->belongsTo('App\Models\Category', 'parent_id')->where('status', 1);
    }

    public function products(){
    	return $this->belongsToMany('App\Models\Product\Product')->where('status', 1)->orderBy('total_views', 'desc');
    }

    public function productsLimit(){
    	return $this->belongsToMany('App\Models\Product\Product')->where('status', 1)->orderBy('total_views', 'desc')->limit($this->productLimit);
    }

}
