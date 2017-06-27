<?php

use App\Models\Cartitem\Cartitem;
use App\Models\GeneralSetting;
use App\Models\Product\Product;


/**
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('app_developer')) {
    /**
     * Helper to grab the developer agency name. --yojan
     *
     * @return mixed
     */
    function app_developer()
    {
        return config('app.developer');
    }
}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}

if (! function_exists('history')) {
    /**
     * Access the history facade anywhere.
     */
    function history()
    {
        return app('history');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if (! function_exists('getRtlCss')) {

    /**
     * The path being passed is generated by Laravel Mix manifest file
     * The webpack plugin takes the css filenames and appends rtl before the .css extension
     * So we take the original and place that in and send back the path.
     *
     * @param $path
     *
     * @return string
     */
    function getRtlCss($path)
    {
        $path = explode('/', $path);
        $filename = end($path);
        array_pop($path);
        $filename = rtrim($filename, '.css');

        return implode('/', $path).'/'.$filename.'.rtl.css';
    }

if (! function_exists('parseDateTimeY_M_D')) {
    /**
     * this is method can be used to get date in 2017/04/23 format
     */
    function parseDateTimeY_M_D($date)
    {
        return \Carbon\Carbon::parse($date)->toDateTimeString();
    }
}



if (! function_exists('crudOps')) {
    /**
     * this is method can be used to generate edit and delete button in table
     * @param string $resource eg:admin.pages.edit where resource = pages
     * @param $id 
     * @return $string
     */
    function crudOps($resource, $id)
    {
        $ops = '<ul class="list-inline no-margin-bottom">';
        $ops .= '<li><a href="'.route('admin.'.$resource.'.edit', $id).'" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a></li>';
        $ops .= '<li><a href="'.route('admin.'.$resource.'.destroy', $id).'" data-method="delete" name="delete_item" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a></li>';
        $ops .= '</ul>';
        return $ops;
    }
}

if (! function_exists('crudOps_for_slider')) {
    /**
     * this is method can be used to generate edit and delete button in table
     * @param string $resource eg:admin.pages.edit where resource = pages
     * @param $id 
     * @return $string
     */
    function crudOps_for_slider($resource, $title)
    {
        $ops = '<ul class="list-inline no-margin-bottom">';
        
        // $ops .= '<li><a href="'.route('admin.'.$resource.'.edit', $id).'" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>  Edit</a></li>';
        $ops .= '<li><a href="'.url('admin/sliders/'.$title.'/list').'" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>  Edit</a></li>';
        $ops .= '<li><a href="'.route('admin.'.$resource.'.destroy', $title).'" data-method="delete" name="delete_item" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  Delete</a></li>';
        $ops .= '</ul>';
        return $ops;
    }
}

    
if (! function_exists('crudOps_for_slides')) {
    /**
     * this is method can be used to generate edit and delete button in table
     * @param string $resource eg:admin.pages.edit where resource = pages
     * @param $id 
     * @return $string
     */
    function crudOps_for_slides($resource, $id)
    {
        $ops = '<ul class="list-inline no-margin-bottom">';
        
        $ops .= '<li><a href="'.route('admin.'.'sliders'.'.edit', $id).'" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>  Edit</a></li>';
        
        $ops .= '<li><a href="'.route('admin.'.$resource.'.destroy', $id).' " data-method="delete" name="delete_item" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></li>';


        $ops .= '</ul>';
        return $ops;
    }
}

if (! function_exists('crudOps_for_staticblock')) {
    /**
     * this is method can be used to generate edit and delete button in table
     * @param string $resource eg:admin.pages.edit where resource = pages
     * @param $id 
     * @return $string
     */
    function crudOps_for_staticblock($resource, $title)
    {
        $ops = '<ul class="list-inline no-margin-bottom">';
        
        $ops .= '<li><a href="'.url('admin/'.$resource.'/'.$title.'/list').'" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>  Edit</a></li>';
        $ops .= '<li><a href="'.route('admin.'.$resource.'.delete', $title).'" data-method="delete" name="delete_item" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>  Delete</a></li>';
        $ops .= '</ul>';
        return $ops;
    }
}

if(!function_exists('parseStatus')){

    function parseStatus($status)
    {
        if ($status==1) {
            return '<label class="label label-success">Enabled</label>';

        }else{

            return '<label class="label label-danger">Disabled</label>';
        }
    }
}



if (! function_exists('generateUniqueSlug')) {
    /**
     * this is method can be used to generate slug
     * @param string $classPath eg: App\Models\Page
     * @param $title 
     * @return $string
     */
    function generateUniqueSlug($classPath, $title)
    {
        $temp = str_slug($title, '-');
        if(!($classPath::where('slug',$temp)->get()->isEmpty()) ){
        $i = 1;
        $newslug = $temp . '-' . $i;
        while(!($classPath::where('slug',$newslug)->get()->isEmpty()) ){
            $i++;
            $newslug = $temp . '-' . $i;
        }
        $temp =  $newslug;
    }
    return $temp;
    }
}

if (! function_exists('generateUniqueUrl')) {
    /**
     * this is method can be used to generate url
     * @param string $classPath eg: App\Models\Page
     * @param $title 
     * @return $string
     */
    function generateUniqueUrl($classPath, $title)
    {
        $temp = str_slug($title, '-');
        if(!($classPath::where('url',$temp)->get()->isEmpty()) ){
        $i = 1;
        $newslug = $temp . '-' . $i;
        while(!($classPath::where('url',$newslug)->get()->isEmpty()) ){
            $i++;
            $newslug = $temp . '-' . $i;
        }
        $temp =  $newslug;
    }
    return $temp;
    }
}

if (! function_exists('checkDir')) {
    /**
     * this is method can be used to make directory if doesnot exists
     * @param $string 
     */
    function checkDir($path)
    {
        if(!File::exists($path)){
            File::makeDirectory($path, 0775, true);
        }
    }
}

if (! function_exists('deleteFile')) {
    /**
     * this is method can be used to delete file if exists
     * @param $string 
     */
    function deleteFile($filepath)
    {
        if(File::exists($filepath)){
            unlink($filepath);
        }
    }
}

if (! function_exists('bulkSelect')) {
    /**
     * this is method can be used to delete file if exists
     * @param $string 
     */
    function bulkSelect($id)
    {
        return "<input type='checkbox' id='checkbox".$id."' class='bulkSelect' data-id='".$id."' name='bulk_select' value='".$id."'><label for='checkbox".$id."'><span></span></label>";
    }
}


if (! function_exists('delete_files')) {
    /* 
     * php delete function that deals with directories recursively
     */
    function delete_files($target) {
        if(is_dir($target)){
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
            
            foreach( $files as $file )
            {
                delete_files( $file );      
            }
          
            rmdir( $target );
        } elseif(is_file($target)) {
            unlink( $target );  
        }
    }
}

if (! function_exists('featured_products')) {
    /* 
     * function that populate featured products
     */
    function featured_products($title = 'Products', $limit=NULL) {
        $products = Product::where('featured', 1)->where('status', 1)->get();
        $html = view('frontend.includes.productssliderlist')->with('products', $products)->with('title', $title)->render();
        return $html;
    }
}

if (! function_exists('hot_products')) {
    /* 
     * function that populate featured products
     */
    function hot_products($title = 'Products', $limit=NULL) {
        $products = Product::where('hot', 1)->where('status', 1)->get();
        $html = view('frontend.includes.productssliderlist')->with('products', $products)->with('title', $title)->render();
        return $html;
    }
}

if (! function_exists('productPrice')) {
    /* 
     * price of product
     */
    function productPrice($id) {
        $product = Product::findOrFail($id);
        $price = (empty($product->productPrice->special_price)) ? $product->productPrice->price : $product->productPrice->special_price;
        return $price;
    }
}

if (! function_exists('custom_number_format')) {
    /* 
     * formatting for currency
     */
    function custom_number_format($money){
        $val = number_format($money, 2);
        $val2 = str_replace(".00", "", (string)$val);
        return $val2;
    }
}

if (! function_exists('countCartItems')) {
    /* 
     * count cartitems
     */
    function countCartItems(){
        $totalCartItems = 0;

        if (Auth::check()) {
           $cartitems = Cartitem::where('user_id', Auth::user()->id)->get();
           foreach ($cartitems as $key => $cartitem) {
                $totalCartItems += $cartitem->qty;
            }
            return $totalCartItems;
        }else {
            $cartItems = Session::has('cart') ? Session::get('cart') : null;
            if (!empty($cartItems)) {
                foreach ($cartItems as $key => $cartItem) {
                    $totalCartItems += $cartItem['qty'];
                }
            }
            return $totalCartItems;
        }
    }
}

if (! function_exists('CartItemsTotalPrice')) {
    /* 
     * total price of cartitems
     */
    function CartItemsTotalPrice(){
        $total = 0;
        if (Auth::check()) {
           $cartitems = Cartitem::where('user_id', Auth::user()->id)->get();
           foreach ($cartitems as $key => $cartitem) {
                $total += productPrice($cartitem->product_id) * $cartitem->qty;
            }
            return custom_number_format($total);
        }else {
            $cartItems = Session::has('cart') ? Session::get('cart') : null;
            if (!empty($cartItems)) {
                foreach ($cartItems as $key => $cartItem) {
                    $total += productPrice($cartItem['productId']) * $cartItem['qty'];
                }
            }
            return custom_number_format($total);
        }
    }
}

if (! function_exists('getLogoUrl')) {
    /* 
     * get logo url
     */
    function getLogoUrl(){
        $setting = GeneralSetting::first();
        return url('images/logo/'.$setting->logo);
    }
}






}
