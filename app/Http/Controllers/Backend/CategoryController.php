<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use View;
use DB;
use Redirect;
use Validator;
use App\Http\Requests\Backend\Category\CreateCategoryRequest;
use App\Http\Requests\Backend\Category\DeleteCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;

class CategoryController extends Controller {

	protected $layout = 'layout';

	public function getIndex()
	{	
		$items 	= Category::orderBy('order')->get();

		$menu 	= new Category;
		$menu   = $menu->getHTML($items);

		// $this->layout->content = View::make('admin.menu.builder', array('items'=>$items,'menu'=>$menu));
		return view('backend.category.builder', compact('items', 'menu'));  //i have used this instead of above;
	}

	public function getNew(){
		return view('backend.category.create');
	}

	public function getEdit($id, UpdateCategoryRequest $request)
	{	
		$item = Category::find($id);
		// $this->layout->content = View::make('admin.menu.edit', array('item'=>$item));
		return view('backend.category.edit', compact('item'));  //i have used this instead of above;

	}

	public function postEdit($id, UpdateCategoryRequest $request)
	{	
		$this->validate($request,[
            // 'title' => 'required|unique:categorys,title,'.$id,
            'title' => 'required',
            'status' => 'required',
            'cat_type' => 'required',
            'upload' => 'image|max:2000',
            'url' => 'unique:categorys,url,'.$id,
        ]);

		DB::transaction(function () use ($request, $id) {
			$item = Category::find($id);

	        if (empty($request->url)) {
	           $url = generateUniqueUrl('App\Models\Category', $request->title);
	        }else{
	            $url = $request->url;
	        }

			if ($request->hasFile('upload')) {
		        $file = $request->file('upload');
		        $destination_path = 'images/category';
		        $filename = str_random(5) . '-' . $file->getClientOriginalName();
		            // $filename = time() . '-' . $file->getClientOriginalExtension();
		        $move =$file->move($destination_path, $filename);
		        if($move){
		        	if(!empty($item->feat_img)){
			        	if(file_exists($destination_path.'/'.$item->feat_img)){
		                    unlink($destination_path.'/'.$item->feat_img);
		                }
		            }
		        }
		    }else{
		    	$filename = $item->feat_img;
		    }

			// $item->title 	= e(Request::get('title','untitled'));
			// $item->label 	= e(Request::get('label',''));	
			// $item->url 		= e(Request::get('url',''));	

			// $item->save();

			$item->title 	= Request::get('title','untitled');
			$item->label 	= Request::get('label','');	
			$item->url 		= $url;	

			$item->description 		= Request::get('description','');	
			$item->status 		= Request::get('status','');	
			$item->meta_title 		= Request::get('meta_title','');	
			$item->meta_keyword 		= Request::get('meta_keyword','');	
			$item->meta_desc 		= Request::get('meta_desc','');	
			$item->feat_img 		= $filename;
			$item->cat_type 		= Request::get('cat_type','');		

			$item->save();


			$prevBanner = $item->banners;
            $prevBannerCount = count($prevBanner);
            $bannerCount = count($request->banner_title);
            // $banner = $_FILES['uploadBanner']['tmp_name'];
            $file = $request->file('uploadBanner');
		    $destination_path = 'images/category/banner';
            $i = 0;
            if ($prevBannerCount <= $bannerCount) {
                while ($i < $prevBannerCount) {
                	// if ($request->hasFile('uploadBanner')) {
	                	if (!empty($file[$i])) {
	                		$filename = str_random(5) . '-' . $file[$i]->getClientOriginalName();
			        		$move = $file[$i]->move($destination_path, $filename);
							if($move){
								if(!empty($prevBanner[$i]->banner_image)){
									deleteFile($destination_path.'/'.$prevBanner[$i]->banner_image);
								}
					        }
	                		$prevBanner[$i]->update([
		                        'banner_title' => $request->banner_title[$i],
								'banner_desc' => $request->banner_desc[$i],
								'banner_image' => $filename,
								'banner_url' => $request->banner_url[$i],
								'banner_position' => $request->banner_position[$i],
								'banner_order' =>$request->banner_order[$i],
		                    ]);
	                	}else{
	                		$prevBanner[$i]->update([
		                        'banner_title' => $request->banner_title[$i],
								'banner_desc' => $request->banner_desc[$i],
								'banner_url' => $request->banner_url[$i],
								'banner_position' => $request->banner_position[$i],
								'banner_order' =>$request->banner_order[$i],
		                    ]);
	                	}
                	// }
                    
                    $i++;
                }
                while ($i < $bannerCount) {
                	if (!empty($file[$i])) {
				        $filename = str_random(5) . '-' . $file[$i]->getClientOriginalName();
				        $file[$i]->move($destination_path, $filename);

				        $item->banners()->create([
							'banner_title' => $request->banner_title[$i],
							'banner_desc' => $request->banner_desc[$i],
							'banner_image' => $filename,
							'banner_url' => $request->banner_url[$i],
							'banner_position' => $request->banner_position[$i],
							'banner_order' =>$request->banner_order[$i],
						]);
				    }
                    $i++;
                }
            }else{
                while ($i < $bannerCount) {
                    if (!empty($file[$i])) {
                		$filename = str_random(5) . '-' . $file[$i]->getClientOriginalName();
		        		$move = $file[$i]->move($destination_path, $filename);
						if($move){
							if(!empty($prevBanner[$i]->banner_image)){
								deleteFile($destination_path.'/'.$prevBanner[$i]->banner_image);
							}
				        }
                		$prevBanner[$i]->update([
	                        'banner_title' => $request->banner_title[$i],
							'banner_desc' => $request->banner_desc[$i],
							'banner_image' => $filename,
							'banner_url' => $request->banner_url[$i],
							'banner_position' => $request->banner_position[$i],
							'banner_order' =>$request->banner_order[$i],
	                    ]);
                	}else{
                		$prevBanner[$i]->update([
	                        'banner_title' => $request->banner_title[$i],
							'banner_desc' => $request->banner_desc[$i],
							'banner_url' => $request->banner_url[$i],
							'banner_position' => $request->banner_position[$i],
							'banner_order' =>$request->banner_order[$i],
	                    ]);
                	}
                    $i++;
                }
                while ($i < $prevBannerCount) {
                    deleteFile($destination_path.'/'.$prevBanner[$i]->banner_image);
                    if(!empty($prevBanner[$i]->banner_image)){
						deleteFile($destination_path.'/'.$prevBanner[$i]->banner_image);
					}
					$prevBanner[$i]->delete();
                    $i++;
                }
            }

		});
		return redirect()->back()->withFlashSuccess('Category updated successfully.');
	}

	// AJAX Reordering function
	public function postIndex()
	{	
	    $source       = e(Request::get('source'));
	    $destination  = e(Request::get('destination', 0));

	    $item             = Category::find($source);

	    if(empty($destination)){
	    	$destination = 0;
	    }
	    $item->parent_id  = $destination;
	    $item->save();

	    $ordering       = json_decode(Request::get('order'));
	    $rootOrdering   = json_decode(Request::get('rootOrder'));

	    if($ordering){
	      foreach($ordering as $order=>$item_id){
	        if($itemToOrder = Category::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    } else {
	      foreach($rootOrdering as $order=>$item_id){
	        if($itemToOrder = Category::find($item_id)){
	            $itemToOrder->order = $order;
	            $itemToOrder->save();
	        }
	      }
	    }

	    return 'ok ';
	}

	public function postNew(CreateCategoryRequest $request)
	{	
		$this->validate($request,[
            // 'title' => 'required|unique:categorys,title',
            'title' => 'required',
            'status' => 'required',
            'cat_type' => 'required',
            'upload' => 'image|max:2000',
            'url' => 'unique:categorys,url',
        ]);

		DB::transaction(function () use ($request) {
	        if (empty($request->url)) {
	           $url = generateUniqueUrl('App\Models\Category', $request->title);
	        }else{
	            $url = $request->url;
	        }

			if ($request->hasFile('upload')) {
		        $file = $request->file('upload');
		        $destination_path = 'images/category';
		        $filename = str_random(5) . '-' . $file->getClientOriginalName();
		            // $filename = time() . '-' . $file->getClientOriginalExtension();
		        $file->move($destination_path, $filename);
		    }else{
		    	$filename = '';
		    }

			// Create a new menu item and save it
			$item = new Category;

			$item->title 	= Request::get('title','untitled');
			$item->label 	= Request::get('label','');	
			$item->url 		= $url;	
			$item->order 	= Category::max('order')+1;

			$item->description 		= Request::get('description','');	
			$item->status 		= Request::get('status','');	
			$item->meta_title 		= Request::get('meta_title','');	
			$item->meta_keyword 		= Request::get('meta_keyword','');	
			$item->meta_desc 		= Request::get('meta_desc','');	
			$item->feat_img 		= $filename;	
			$item->cat_type 		= Request::get('cat_type','');		

			$item->save();

			$i = 0;
			while($i < count(Request::get('banner_title'))){
		        $file = $request->file('uploadBanner');
		        $destination_path = 'images/category/banner';

				// if ($request->hasFile('uploadBanner')) {
				if (!empty($file[$i])) {
			        $filename = str_random(5) . '-' . $file[$i]->getClientOriginalName();
			        $file[$i]->move($destination_path, $filename);

			        $item->banners()->create([
						'banner_title' => $request->banner_title[$i],
						'banner_desc' => $request->banner_desc[$i],
						'banner_image' => $filename,
						'banner_url' => $request->banner_url[$i],
						'banner_position' => $request->banner_position[$i],
						'banner_order' =>$request->banner_order[$i],
					]);
			    }
		    	$i++;
			}

		});

		return Redirect::to('admin/category');
	}

	public function postDelete(DeleteCategoryRequest $request)
	{
		$id = Request::get('delete_id');
		// Find all items with the parent_id of this one and reset the parent_id to zero
		$items = Category::where('parent_id', $id)->get()->each(function($item)
		{
			$item->parent_id = 0;  
			$item->save();  
		});

		// Find and delete the item that the user requested to be deleted
		$item = Category::find($id);
		$item->delete();

		return Redirect::to('admin/category');
	}
}