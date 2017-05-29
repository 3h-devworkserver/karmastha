<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GeneralSetting;
use View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
    	$categorys = Category::where('parent_id', 0)->where('status', 1)->orderBy('order', 'asc')->get();
    	$setting = GeneralSetting::first();
        if(empty($setting)){
            $setting = new GeneralSetting;
            $setting->meta_title = 'Karmastha';
            $setting->meta_desc = '';
            $setting->meta_keyword = '';
            $setting->author = '';
        }
    	// $setting1 = array();
    	// $setting1['facebook'] = $setting->facebook;

    	// $footer = StaticBlock::where('page_id', NULL)->first();
    	View::share ( 'categorys', $categorys );
    	View::share ( 'setting', $setting );
    	// View::share ( 'setting1', $setting1 );
    	// View::share ( 'footer', $footer );
    }
}
