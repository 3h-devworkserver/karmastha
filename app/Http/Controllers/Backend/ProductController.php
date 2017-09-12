<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\CreateProductRequest;
use App\Http\Requests\Backend\Product\DeleteProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use App\Models\Access\User\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Member;
use App\Models\Product\Product;
use App\Models\ProductGroup\ProductGroup;
use App\Models\Product\ProductGallery;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\AttributeValue;
use App\Models\TmpImage;
use DB;
use Datatables;
use Illuminate\Http\Request;
use Image;
use Auth;

class ProductController extends Controller
{
    private $tmpDir = 'images/tmp/';
    private $productDir = 'images/product/';
    private $baseWidth = 458;
    private $baseHeight = 508;
    private $smallWidth = 252;
    private $smallHeight = 250;
    private $thumbnailWidth = 124;
    private $thumbnailHeight = 115;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index');
    }

    /**
     * ajax loading of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function load(){
        $pages = Product::select('id', 'name', 'slug', 'sku', 'created_at', 'updated_at', 'status');
        return Datatables::of($pages)
            ->escapeColumns(['name', 'slug', 'sku'])
            ->addColumn('bulk', function ($data) {
                return bulkSelect($data->id);
            })
            // ->editColumn('featured', function ($data) {
            //     return $data->featured_label;
            // })
            ->addColumn('price', function($data){
                return 'Rs '.$data->productPrice->price;
            })
            // ->addColumn('special_price', function($data){
            //     return $data->productPrice->special_price;
            // })
            ->editColumn('created_at', function($data){ 
                return parseDateTimeY_M_D($data->created_at) ;
            })
            ->editColumn('updated_at', function($data){ 
                return parseDateTimeY_M_D($data->updated_at) ;
            })
            ->editColumn('status', function ($data) {
                return $data->status_label;
            })
            ->addColumn('action', function($data){
                return crudOps('products', $data->id);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  App\Http\Requests\Backend\Product\CreateProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateProductRequest $request)
    {
        $rand = str_random(20);
        $brand = Brand::where('status', 1)->orderBy('b_order', 'asc')->pluck('brand_name', 'id');
        $brand->prepend('--Select--', '');
        $categorys = Category::where('parent_id', 0)->where('status', 1)->orderBy('order', 'asc')->get();
        $attributes = Attribute::where('status', 1)->orderBy('attr_order', 'asc')->pluck('name', 'id');
        $attributeValues = AttributeValue::orderBy('value_order', 'asc')->get();
        $productGroups = ProductGroup::where('status', 1)->pluck('title', 'id');
        return view('backend.products.create', compact('brand', 'categorys', 'rand', 'attributes', 'attributeValues', 'productGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Backend\Product\CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        // if (!empty($request->identifier)) {
        //         $i = 0;
        //         while($i < count($request->identifier)){
        //             // $productAttrCombination = $product->productAttrCombination()->create([
        //             //     'identifier' => $request->identifier[$i] ,
        //             //     'quantity' => $request->comb_quantity[$i] ,
        //             // ]);

        //             if(!empty(count($request->attribute_select))){
        //                 $y = 0;
        //                 while($y < count($request->attribute_select[$i])){
        //                    echo '<br>attribute_value_id = '.$i.'->' .$i .'&'. $y. '='.$request->attribute_select[$i][$y];

        //                     $y++;
        //                 }
        //             }
        //                 die();
        //             $i++;
        //         }
        //     }

        // return $request->all();
        // return $request->attribute_select[1];
        $this->validate($request,[
            'name' => 'required',            
            'sku' => 'required',            
            'short_desc' => 'required',            
            'detail' => 'required',            
            // 'return_policy' => 'required',            
            // 'featured' => 'required',            
            'status' => 'required',  
            'slug' => 'unique:products,slug',    
            'brand_id' => 'numeric|exists:brands,id',    

            'price' => 'required|numeric', 

            'manage_stock' => 'required', 

            // 'type' => 'required',     
        ]);

        DB::transaction(function() use ($request){
            if (empty($request->slug)) {
                $slug = generateUniqueSlug('App\Models\Product\Product', $request->name);
            }else{
                $slug = $request->slug;
            }
            $product = Product::create([
                //general information
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'slug' => $slug,
                'sku' => $request->sku,
                'brand_id' => $request->brand_id,
                'short_desc' => $request->short_desc,
                'detail' => $request->detail,
                // 'return_policy' => $request->return_policy,
                // 'offer' => $request->offer,
                // 'release_note' => $request->release_note,
                // 'featured' => $request->featured,
                // 'hot' => $request->hot,
                // 'trending' => $request->trending,
                'tags' => $request->tags,
                'status' => $request->status,

                //meta information
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_desc' => $request->meta_desc,
            ]);

            //product groups
            $product->productGroups()->attach($request->productGroup);

            $product->productPrice()->create([
                //price
                'price'=> $request->price,  
                'special_price'=> $request->special_price,
                'main_price' => (empty($request->special_price))? $request->price : $request->special_price,
            ]);

            $product->productInventory()->create([
                //inventory
                'manage_stock'=> $request->manage_stock,  
                'availability'=> $request->availability,  
                'quantity'=> $request->quantity,  
            ]);

            //categorys associated with product
            $product->categorys()->attach($request->category);

            //storing attribute combination values
            if (!empty($request->identifier)) {
                $i = 0;
                while($i < count($request->identifier)){
                    $string = '';
                    if(count($request->attribute_select[$i]) > 0){
                        $arr = $request->attribute_select[$i];
                        sort($arr);
                        $string = implode(',', $arr);
                    }
                    $productAttrCombination = $product->productAttrCombination()->create([
                        'identifier' => $request->identifier[$i] ,
                        'quantity' => $request->comb_quantity[$i] ,
                        'combination' => $string ,
                    ]);

                    if(!empty(count($request->attribute_select))){
                        $y = 0;
                        while($y < count($request->attribute_select[$i])){
                          $productAttrCombination->productAttrCombinationValue()->create([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                    }

                    // $x = 0;
                    // while($x < count($request->attribute_select)){
                    //     $y = 0;
                    //     while($y < count($request->attribute_select[$x])){
                    //         $productAttrCombination->productAttrCombinationValue()->create([
                    //             'attribute_value_id' => $request->attribute_select[$x][$y],
                    //         ]);
                    //         $y++;
                    //     }
                    //     $x++;
                    // }

                    $i++;
                }
            }

            // if(!empty($request->attr_type)){
            //     $i =0;
            //     while($i < count($request->attr_type)){
            //         $product->productAttributes()->create([
            //             //atribute
            //             'attr_type'=>$request->attr_type[$i],
            //             'attr_name'=>$request->attr_name[$i],
            //             'value_text'=>($request->attr_type[$i] == 'textfield')? $request->value_text[$i]: '',
            //             'value_textarea'=>($request->attr_type[$i] == 'textarea')? $request->value_textarea[$i]: '',
            //             'value_dropdown'=>($request->attr_type[$i] == 'dropdown')? $request->value_dropdown[$i]: '',
            //             'value_number_min'=>($request->attr_type[$i] == 'number')? $request->value_number_min[$i]: 0,
            //             'value_number_max'=>($request->attr_type[$i] == 'number')?$request->value_number_max[$i]: 0,
            //             'value_number_step'=>($request->attr_type[$i] == 'number')?$request->value_number_step[$i]: 0,
            //             'attr_order'=>(!empty($request->attr_order[$i])) ? $request->attr_order[$i] : 0,
            //         ]);
            //         $i++;
            //     }
            // }

            //storing images in db and copying images from tmp
            $groupIdentifier = $request->group_identifier;
            $gallerys = TmpImage::where('group_identifier',$groupIdentifier)->get();

            $pathOriginal =$this->productDir.$product->id.'/original/';
            $pathBase =$this->productDir.$product->id.'/base/';
            $pathSmall =$this->productDir.$product->id.'/small/';
            $pathThumbnail =$this->productDir.$product->id.'/thumbnail/';

            checkDir($pathOriginal);
            checkDir($pathBase);
            checkDir($pathSmall);
            checkDir($pathThumbnail);

            $i= 0;
            foreach ($gallerys as $gallery){
                $baseImg = 0;
                if(!empty($request->base_img)){
                    if (in_array($gallery->id, $request->base_img)) {
                        $baseImg = 1;
                    }else{
                        $baseImg = 0;
                    }
                }
                $smallImg = 0;
                if(!empty($request->small_img)){
                    if (in_array($gallery->id, $request->small_img)) {
                        $smallImg = 1;
                    }else{
                        $smallImg = 0;
                    }
                }
                $thumbnail = 0;
                if(!empty($request->thumbnail_img)){
                    if (in_array($gallery->id, $request->thumbnail_img)) {
                        $thumbnail = 1;
                    }else{
                        $thumbnail = 0;
                    }
                }

                $tmpImage =$this->tmpDir.$gallery->image;
                
                //resize and transfer images
                $img = Image::make($tmpImage);
                $img->save($pathOriginal.$gallery->image);

                $img1 = Image::make($tmpImage);
                $img1->fit($this->baseWidth, $this->baseHeight);
                $img1->save($pathBase.$gallery->image);

                $img2 = Image::make($tmpImage);
                $img2->fit($this->smallWidth, $this->smallHeight);
                $img2->save($pathSmall.$gallery->image);

                $img3 = Image::make($tmpImage);
                $img3->fit($this->thumbnailWidth, $this->thumbnailHeight);
                $img3->save($pathThumbnail.$gallery->image);

                $product->gallerys()->create([
                    'image' => $gallery->image,
                    'base_image' => $baseImg,
                    'small_image' => $smallImg,
                    'thumbnail' => $thumbnail,
                    'image_order' =>$request->image_order[$i] ,
                ]);
                $i++;
                //delete tmp image and delete record from tmp table
                deleteFile($tmpImage);
                $gallery->delete();

            }

        });// end of transaction

        return redirect('admin/products')->withFlashSuccess('Product information stored successfully.');
    }

    public function storeImage(Request $request){
        $image = $request->file('image');

        if($request->hasFile('image')){
            $count =  count($request->file('image'));
            $files = $request->file('image');
            $destination_path1 = 'images/tmp';
            $i =0;
            $groupIdentifier = $request->rand;
            $uploadGroup = str_random(20);
            while($i < $count){
                $filename = str_random(10). '-' . $files[$i]->getClientOriginalName();
                $files[$i]->move($destination_path1, $filename);
               
                DB::table('tmp_image')->insert(
                    [
                    'image'=> $filename, 
                    'group_identifier'=>$groupIdentifier,
                    'upload_group'=>$uploadGroup

                    ]
                );
                $i++;
            }
        }
        $tmpImages = TmpImage::where('upload_group', $uploadGroup)->get();
        $html = '';
        $i = 0;
        $j = 1000;
        $k = 2000;
        $rand = str_random(3);
        foreach ($tmpImages as $image) {
            $url = asset($this->tmpDir.$image->image);
            // $deleteUrl = url('tmp/image/delete/'.$image->id);
            $html .= "<tr><td><img src=\"".$url."\" height=\"50\" width=\"50\"></td><td><input type=\"number\" name=\"image_order[]\" value=\"0\" min='0' step='1'></td><td><input name=\"base_img[]\" type=\"checkbox\" id=\"".$rand.$i."\" value=\"".$image->id."\"><label for=\"".$rand.$i."\"><span></span></label></td><td><input name=\"small_img[]\" type=\"checkbox\" id=\"".$rand.$j."\" value=\"".$image->id."\"><label for=\"".$rand.$j."\"><span></span></label> </td><td><input name=\"thumbnail_img[]\" type=\"checkbox\" id=\"".$rand.$k."\" value=\"".$image->id."\"><label for=\"".$rand.$k."\"><span></span></label></td><td><a class=\"btn btn-sm btn-danger fa fa-trash deleteTmpImg\" href=\"javascript:void(0);\" data-id=\"".$image->id."\" ></a> <i class=\"delSpin fa fa-spinner fa-spin display-none\"></i></td></tr>";
        $i++;
        $j++;
        $k++;
        }

        return response()->json(['success'=> 'true', 'html'=>$html]);

    }

    //  /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function storePrice(CreateProductRequest $request)
    // {
    //     $this->validate($request,[
    //         'price' => 'required',            
    //     ]);

    //     DB::transaction(function() use ($request){
    //         if (empty($request->slug)) {
    //             $request->request->remove('slug');
    //             $slug = generateUniqueSlug('App\Models\Product\Product', $request->name);
    //             $request->request->add(['slug' => $slug]);
    //         }else{
    //             $slug = $request->slug;
    //         }
    //         Product::create($request->all());
    //     });

    //     return redirect()->back()->withPart('price')->withFlashSuccess('Product information stored successfully.');
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Http\Requests\Backend\Product\UpdateProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UpdateProductRequest $request)
    {
        $product = Product::findOrFail($id);
        $catSelected = $product->categorys;
        $catSelected = $catSelected->pluck('id');
        $rand = str_random(20);
        $brand = Brand::where('status', 1)->orderBy('b_order', 'asc')->pluck('brand_name', 'id');
        $brand->prepend('--Select--', '');
        $categorys = Category::where('parent_id', 0)->where('status', 1)->orderBy('order', 'asc')->get();

        $attributes = Attribute::where('status', 1)->orderBy('attr_order', 'asc')->pluck('name', 'id');
        $attributeValues = AttributeValue::orderBy('value_order', 'asc')->get();

        $productGroups = ProductGroup::where('status', 1)->pluck('title', 'id');

        return view('backend.products.edit',compact('product', 'brand', 'categorys', 'catSelected', 'rand', 'attributes', 'attributeValues', 'productGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Backend\Product\UpdateProductRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => 'required',            
            'sku' => 'required',            
            'short_desc' => 'required',            
            'detail' => 'required',            
            // 'return_policy' => 'required',            
            // 'featured' => 'required',            
            'status' => 'required',  
            'slug' => 'unique:products,slug,'.$id,    
            'brand_id' => 'numeric|exists:brands,id',    

            'price' => 'required|numeric', 

            'manage_stock' => 'required', 
        ]);

        DB::transaction(function() use ($request, $id){

            if (empty($request->slug)) {
                $slug = generateUniqueSlug('App\Models\Product\Product', $request->name);
            }else{
                $slug = $request->slug;
            }
            $product = Product::findOrFail($id);
            $product->update([
                //general information
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'slug' => $slug,
                'sku' => $request->sku,
                'brand_id' => $request->brand_id,
                'short_desc' => $request->short_desc,
                'detail' => $request->detail,
                // 'return_policy' => $request->return_policy,
                // 'offer' => $request->offer,
                // 'release_note' => $request->release_note,
                // 'featured' => $request->featured,
                // 'hot' => $request->hot,
                // 'trending' => $request->trending,
                'tags' => $request->tags,
                'status' => $request->status,

                //meta information
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_desc' => $request->meta_desc,
            ]);

            //product groups
            $product->productGroups()->sync($request->productGroup);

            $product->productPrice()->update([
                //price
                'price'=> $request->price,  
                'special_price'=> $request->special_price, 
                'main_price' => (empty($request->special_price))? $request->price : $request->special_price,
            ]);

            $product->productInventory()->update([
                //inventory
                'manage_stock'=> $request->manage_stock,  
                'availability'=> $request->availability,  
                'quantity'=> $request->quantity,  
            ]);

            //categorys associated with product
            $product->categorys()->sync($request->category);


            $prevAttributesCombSelected = $product->productAttrCombination;
            $prevAttrCombCount = count($prevAttributesCombSelected);
            // $attrCombCount = count($request->attribute_select);
            $attrCombCount = count($request->identifier);
            $i = 0;
            if ($prevAttrCombCount <= $attrCombCount) {
                while ($i < $prevAttrCombCount) {
                    $string = '';
                    if(count($request->attribute_select[$i]) > 0){
                        $arr = $request->attribute_select[$i];
                        sort($arr);
                        $string = implode(',', $arr);
                    }
                    // echo $string.'<pre>';
                    $prevAttributesCombSelected[$i]->update([
                        'identifier' => $request->identifier[$i] ,
                        'quantity' => $request->comb_quantity[$i] ,
                        'combination' => $string ,
                    ]);

                    /**  ------ update, create or delete combination values ----  **/
                    $prevAttributesCombValueSelected = $prevAttributesCombSelected[$i]->productAttrCombinationValue;
                    $prevAttributesCombValueSelectedCount = count($prevAttributesCombValueSelected);
                    // $combination = $request->attribute_select[$i];
                    $combinationCount = count($request->attribute_select[$i]);
                    $y = 0;
                    if ($prevAttributesCombValueSelectedCount <= $combinationCount) {
                        while ( $y < $prevAttributesCombValueSelectedCount) {
                            $prevAttributesCombValueSelected[$y]->update([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                        while ( $y < $combinationCount) {
                            $prevAttributesCombSelected[$i]->productAttrCombinationValue()->create([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                    }else{
                        while ( $y < $combinationCount) {
                            $prevAttributesCombValueSelected[$y]->update([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                        while ( $y < $prevAttributesCombValueSelectedCount) {
                            $prevAttributesCombValueSelected[$y]->delete();
                            $y++;
                        }
                    }
                    $i++;
                }
                while ($i < $attrCombCount) {
                    $string = '';
                    if(count($request->attribute_select[$i]) > 0){
                        $arr = $request->attribute_select[$i];
                        sort($arr);
                        $string = implode(',', $arr);
                    }
                    // echo $string.'<pre>';
                    $productAttrCombination = $product->productAttrCombination()->create([
                        'identifier' => $request->identifier[$i] ,
                        'quantity' => $request->comb_quantity[$i] ,
                        'combination' => $string ,
                    ]);

                    if(!empty(count($request->attribute_select))){
                        $y = 0;
                        while($y < count($request->attribute_select[$i])){
                          $productAttrCombination->productAttrCombinationValue()->create([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                    }
                    $i++;
                }
            }else{
                while ($i < $attrCombCount) {
                    $string = '';
                    if(count($request->attribute_select[$i]) > 0){
                        $arr = $request->attribute_select[$i];
                        sort($arr);
                        $string = implode(',', $arr);
                    }
                    // echo $string.'<pre>';
                    $prevAttributesCombSelected[$i]->update([
                        'identifier' => $request->identifier[$i] ,
                        'quantity' => $request->comb_quantity[$i] ,
                        'combination' => $string ,
                    ]);

                    /**  ------ update, create or delete combination values ----  **/
                    $prevAttributesCombValueSelected = $prevAttributesCombSelected[$i]->productAttrCombinationValue;
                    $prevAttributesCombValueSelectedCount = count($prevAttributesCombValueSelected);
                    // $combination = $request->attribute_select[$i];
                    $combinationCount = count($request->attribute_select[$i]);
                    $y = 0;
                    if ($prevAttributesCombValueSelectedCount <= $combinationCount) {
                        while ( $y < $prevAttributesCombValueSelectedCount) {
                            $prevAttributesCombValueSelected[$y]->update([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                        while ( $y < $combinationCount) {
                            $prevAttributesCombSelected[$i]->productAttrCombinationValue()->create([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                    }else{
                        while ( $y < $combinationCount) {
                            $prevAttributesCombValueSelected[$y]->update([
                                'attribute_value_id' => $request->attribute_select[$i][$y],
                            ]);
                            $y++;
                        }
                        while ( $y < $prevAttributesCombValueSelectedCount) {
                            $prevAttributesCombValueSelected[$y]->delete();
                            $y++;
                        }
                    }
                    $i++;
                }
                while ($i < $prevAttrCombCount) {
                    $prevAttributesCombSelected[$i]->delete();
                    $i++;
                }
            }

            // $prevAttributes = $product->productAttributes;
            // $prevAttrCount = count($prevAttributes);
            // $attrCount = count($request->attr_type);
            // $i = 0;
            // if ($prevAttrCount <= $attrCount) {
            //     while ($i < $prevAttrCount) {
            //         $prevAttributes[$i]->update([
            //             'attr_type'=>$request->attr_type[$i],
            //             'attr_name'=>$request->attr_name[$i],
            //             'value_text'=>($request->attr_type[$i] == 'textfield') ? $request->value_text[$i] : '',
            //             'value_textarea'=>($request->attr_type[$i] == 'textarea') ? $request->value_textarea[$i] : '',
            //             'value_dropdown'=>($request->attr_type[$i] == 'dropdown') ? $request->value_dropdown[$i] : '',
            //             'value_number_min'=>($request->attr_type[$i] == 'number') ? $request->value_number_min[$i] : 0,
            //             'value_number_max'=>($request->attr_type[$i] == 'number') ? $request->value_number_max[$i] : 0,
            //             'value_number_step'=>($request->attr_type[$i] == 'number') ?  $request->value_number_step[$i] : 0,
            //             'attr_order'=>(!empty($request->attr_order[$i])) ? $request->attr_order[$i] : 0,
            //         ]);
            //         $i++;
            //     }
            //     while ($i < $attrCount) {
            //         $product->productAttributes()->create([
            //             'attr_type'=>$request->attr_type[$i],
            //             'attr_name'=>$request->attr_name[$i],
            //             'value_text'=>($request->attr_type[$i] == 'textfield')? $request->value_text[$i]: '',
            //             'value_textarea'=>($request->attr_type[$i] == 'textarea')? $request->value_textarea[$i]: '',
            //             'value_dropdown'=>($request->attr_type[$i] == 'dropdown')? $request->value_dropdown[$i]: '',
            //             'value_number_min'=>($request->attr_type[$i] == 'number')? $request->value_number_min[$i]: 0,
            //             'value_number_max'=>($request->attr_type[$i] == 'number')?$request->value_number_max[$i]: 0,
            //             'value_number_step'=>($request->attr_type[$i] == 'number')?$request->value_number_step[$i]: 0,
            //             'attr_order'=>(!empty($request->attr_order[$i])) ? $request->attr_order[$i] : 0,
            //         ]);
            //         $i++;
            //     }
            // }else{
            //     while ($i < $attrCount) {
            //         $prevAttributes[$i]->update([
            //             'attr_type'=>$request->attr_type[$i],
            //             'attr_name'=>$request->attr_name[$i],
            //             'value_text'=>($request->attr_type[$i] == 'textfield')? $request->value_text[$i]: '',
            //             'value_textarea'=>($request->attr_type[$i] == 'textarea')? $request->value_textarea[$i]: '',
            //             'value_dropdown'=>($request->attr_type[$i] == 'dropdown')? $request->value_dropdown[$i]: '',
            //             'value_number_min'=>($request->attr_type[$i] == 'number')? $request->value_number_min[$i]: 0,
            //             'value_number_max'=>($request->attr_type[$i] == 'number')?$request->value_number_max[$i]: 0,
            //             'value_number_step'=>($request->attr_type[$i] == 'number')?$request->value_number_step[$i]: 0,
            //             'attr_order'=>(!empty($request->attr_order[$i])) ? $request->attr_order[$i] : 0,
            //         ]);
            //         $i++;
            //     }
            //     while ($i < $prevAttrCount) {
            //         $prevAttributes[$i]->delete();
            //         $i++;
            //     }
            // }

            //changing base,small,thumbnail images and order for images other than new
            $i = 0;
            foreach ($product->galleryswithOrder as $gallery) {
                $baseImg = 0;
                if(!empty($request->base_img_edit)){
                    if (in_array($gallery->id, $request->base_img_edit)) {
                        $baseImg = 1;
                    }else{
                        $baseImg = 0;
                    }
                }
                $smallImg = 0;
                if(!empty($request->small_img_edit)){
                    if (in_array($gallery->id, $request->small_img_edit)) {
                        $smallImg = 1;
                    }else{
                        $smallImg = 0;
                    }
                }
                $thumbnail = 0;
                if(!empty($request->thumbnail_img_edit)){
                    if (in_array($gallery->id, $request->thumbnail_img_edit)) {
                        $thumbnail = 1;
                    }else{
                        $thumbnail = 0;
                    }
                }
                $gallery->update([
                    // 'image' => $gallery->image,
                    'base_image' => $baseImg,
                    'small_image' => $smallImg,
                    'thumbnail' => $thumbnail,
                    'image_order' =>$request->image_order_edit[$i] ,
                ]);
                $i++;
            }

            //storing images in db and copying images from tmp
            $groupIdentifier = $request->group_identifier;
            $gallerys = TmpImage::where('group_identifier',$groupIdentifier)->get();

            $pathOriginal =$this->productDir.$product->id.'/original/';
            $pathBase =$this->productDir.$product->id.'/base/';
            $pathSmall =$this->productDir.$product->id.'/small/';
            $pathThumbnail =$this->productDir.$product->id.'/thumbnail/';

            checkDir($pathOriginal);
            checkDir($pathBase);
            checkDir($pathSmall);
            checkDir($pathThumbnail);

            $i= 0;
            foreach ($gallerys as $gallery){
                $baseImg = 0;
                if(!empty($request->base_img)){
                    if (in_array($gallery->id, $request->base_img)) {
                        $baseImg = 1;
                    }else{
                        $baseImg = 0;
                    }
                }
                $smallImg = 0;
                if(!empty($request->small_img)){
                    if (in_array($gallery->id, $request->small_img)) {
                        $smallImg = 1;
                    }else{
                        $smallImg = 0;
                    }
                }
                $thumbnail = 0;
                if(!empty($request->thumbnail_img)){
                    if (in_array($gallery->id, $request->thumbnail_img)) {
                        $thumbnail = 1;
                    }else{
                        $thumbnail = 0;
                    }
                }

                $tmpImage =$this->tmpDir.$gallery->image;
                
                //resize and transfer images
                $img = Image::make($tmpImage);
                $img->save($pathOriginal.$gallery->image);

                $img1 = Image::make($tmpImage);
                $img1->fit($this->baseWidth, $this->baseHeight);
                $img1->save($pathBase.$gallery->image);

                $img2 = Image::make($tmpImage);
                $img2->fit($this->smallWidth, $this->smallHeight);
                $img2->save($pathSmall.$gallery->image);

                $img3 = Image::make($tmpImage);
                $img3->fit($this->thumbnailWidth, $this->thumbnailHeight);
                $img3->save($pathThumbnail.$gallery->image);

                $product->gallerys()->create([
                    'image' => $gallery->image,
                    'base_image' => $baseImg,
                    'small_image' => $smallImg,
                    'thumbnail' => $thumbnail,
                    'image_order' =>$request->image_order[$i] ,
                ]);
                $i++;
                //delete tmp image and delete record from tmp table
                deleteFile($tmpImage);
                $gallery->delete();

            }

        });
            // die();
        return redirect()->back()->withFlashSuccess('Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  App\Http\Requests\Backend\Product\DeleteProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteProductRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        delete_files($this->productDir.$id.'/');
        return redirect('/admin/products')->withFlashSuccess('Product deleted successfully.');
    }

    /**
     * Remove the tmp image from storage and db.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTmpImage($id){
        try{
            DB::transaction(function() use ($id){
                $image = TmpImage::findOrFail($id);
                deleteFile($this->tmpDir.$image->image);
                $image->delete();
            });
            $data['stat']= "success";
            $data['msg'] = "Image deleted successfully";
            return $data;
        }catch(\Exception $e){
            $data['stat']= "failed";
            $data['msg'] = $e->getMessage();
            return $data;
        }

    }

    /**
     * Remove the product image from storage and db.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProductImage($id){
        try{
            DB::transaction(function() use ($id){
                $image = ProductGallery::findOrFail($id);
                deleteFile($this->productDir.$image->product_id.'/original/'.$image->image);
                deleteFile($this->productDir.$image->product_id.'/base/'.$image->image);
                deleteFile($this->productDir.$image->product_id.'/small/'.$image->image);
                deleteFile($this->productDir.$image->product_id.'/thumbnail/'.$image->image);
                $image->delete();
            });
            $data['stat']= "success";
            $data['msg'] = "Image deleted successfully";
            return $data;
        }catch(\Exception $e){
            $data['stat']= "failed";
            $data['msg'] = $e->getMessage();
            return $data;
        }

    }

    /**
     * Remove bulk products form storage.
     *
     * @param  App\Http\Requests\Backend\Product\DeleteProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function deleteProducts(DeleteProductRequest $request)
    {
        if (empty($request->ids)) {
            return redirect('/admin/products')->withFlashDanger('Please select products to delete.');
        }

        DB::transaction(function() use ($request){
            $ids = explode(',', $request->ids);
            foreach ($ids as $key => $id) {
                $product = Product::findOrFail($id);
                $product->delete();
                delete_files($this->productDir.$id.'/');
            }
        });
        return redirect('/admin/products')->withFlashSuccess('Products deleted successfully.');
    }



}
