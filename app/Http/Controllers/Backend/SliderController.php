<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Validator;
use App\Models\Slider;
use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Slider\createSliderRequest;
use App\Http\Requests\Backend\Slider\updateSliderRequest;
use App\Http\Requests\Backend\Slider\deleteSliderRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class SliderController extends Controller
{	

	/**
     * Base Directory to upload images.
     * @var string
     */
	protected $baseDir="images/member_logo";
	protected $baseDir_Slide="images/slides";


	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index()
	{
		return view('backend.sliders.index');
	}

	/**
	 * load datatable for slider-table
	 * @return [columns] [datatable data]
	 */
	public function load()
	{

		$sliders=Slide::select('title')->groupBy('title')->get();

		//$sliders=Slide::select('title','created_at','updated_at');
				
		return Datatables::of($sliders)
		->escapeColumns(['title'])
		// ->editColumn('created_at',function($data){
		// 	return parseDateTimeY_M_D($data->created_at);
		// })
		// ->editColumn('updated_at',function($data){
		// 	return parseDateTimeY_M_D($data->updated_at);
		// })	
		->addColumn('action',function($data){
			return crudOps_for_slider('sliders',$data->title);
		})
		->make(true);
	}


	/**
	 * load datatable for slide-list-table
	 * @return [type] [description]
	 */
	public function load_slide_list(Request $request)
	{	

		//$slider=Slider::find($request->id);	
		$title=$request->title;

		$slides=Slide::where('title',$title);

		return Datatables::of($slides)
		->escapeColumns(['id','Slider_image','caption','link'])
		->addColumn('action',function($data){
			return crudOps_for_slides('slides',$data->id);
		})
		->make(true);

	}


	/**
	 * Create new slider
	 * @param  createSliderRequest $request [description]
	 * @return [type]                       [description]
	 */
	public function create(createSliderRequest $request)
	{	
		$slider_title=null;
		return view('backend.sliders.create',compact('slider_title'));
	}

	public function slide_create($slider_title,createSliderRequest $request)
	{	
		//$slider=Slider::find($slider_id);

		return view('backend.sliders.create',compact('slider_title'));
	}

	/**
	 * Create New Slider
	 * @param  createSliderRequest $request [description]
	 * @return [type]                       [description]
	 */
	public function store(createSliderRequest $request)
	{

		// $validator = Validator::make($request->all(), [
  // 		    'title' => 'required',

		//  	'Slider_image' => 'required',

		// 	]);

		//  if ($validator->fails()) {

  //  			$this->throwValidationException($request, $validator);
  //        }

	
		$slide=Slide::where('title','=',$request->title)->first();
	

			$files=$request->file('Slider_image');

			
				foreach ($request->count as $key => $input)
				{

					if ( !empty($files[$key]) ){

						$filename=time().$files[$key]->getClientOriginalName();
						$filepath[$key]=$this->Upload_and_GetFilepath($files[$key],$filename);
					}
					else
					{
						$filepath[$key]='No slide';
					}

					DB::transaction(function() use($request,$filepath,$key)
					{
							Slide::create([
								'title'=>$request->title,
								'caption'=>$request->caption[$key],
								'Slider_image'=>$filepath[$key],
								'link'=>$request->link[$key],
								]);			

					 });		
				}
			
			if ( $slide === null ) {
			
				return redirect()->route('admin.sliders.index')->withFlashSuccess('Slider created successfully.');
			}
			else{

				return redirect(url('admin/sliders/'.$request->title.'/list'))->withFlashSuccess('Slides added successfully.');
			
			}	
	}


	/**
	 * [slide_list description]
	 * @param  [Integer]  $id      [description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function slide_list($title,Request $request)
	{	

		$slide=Slide::where('title',$title)->first();
		
		$title=$slide->title;
		// $slider=Slider::find($id);

		return  view('backend.sliders.list',compact('title'));
	}

	
	/**
	 * Edit slider
	 * @param  [Integer]              $id      [slider id]
	 * @param  updateSliderRequest $request [description]
	 * @return [view]                       [edit.blade.php]
	 */
	public function edit($id,updateSliderRequest $request)
	{

		$slide=Slide::find($id);

		//$slider=Slider::findOrFail($id);
		
		//$slides=Slide::where('title',$slider->title)->get();


		return view('backend.sliders.slide_edit',compact('slide'));

	}


	/**
	 * update slider and slides.
	 * @param  [Integer]              $id      [id of slider]
	 * @param  updateSliderRequest $request [description]
	 * @return [type]                       [description]
	 */
	public function update($title,updateSliderRequest $request)
	{
		
		$slides=Slide::where('title',$title)->get();

		//Updaing each slides .				
		foreach ($slides as $key => $slide)
		{
					$slide->update([
						'title'=>$request->title,
						]);
		}
			
		return redirect()->back()->withFlashSuccess('Title Successfully Updated.');	 	
	}

	/**
	 * Update slide individually.
	 * @param  [type]              $id      [description]
	 * @param  updateSliderRequest $request [description]
	 * @return [type]                       [description]
	 */
	public function updateSlide($id,updateSliderRequest $request)
	{
		
			$slide=Slide::findOrFail($id);	

			//check if new file is uploaded and update slide-image.
			
			if ( $request->hasFile('Slider_image')){
				$file= $request->file('Slider_image');
				$filename=time().$file->getClientOriginalName();
				$filepath=$this->Upload_and_GetFilepath($file,$filename);
				

				$slide->update([
					'title'=>$request->title,
					'caption'=>$request->caption,
					'Slider_image'=>$filepath,
					'link'=>$request->link,
					]);

			}
					//slide image or file not uploaded so updating other fields only.
			else{

				$slide->update([
					'title'=>$request->title,
					'caption'=>$request->caption,
					'link'=>$request->link,
					]);
			}

				
	
		return redirect()->back()->withFlashSuccess('Slider Successfully Updated.');
	}


	/**
     * Destroy Slider
     * @param  [type]              $id      [description]
     * @param  deleteMemberRequest $request [description]
     * @return [type]                       [description]
     */
	public function destroy($title, deleteSliderRequest $request)
	{

		
			$slides=Slide::where('title',$title)->get();

			foreach ($slides as  $slide) {

				DB::transaction(function () use ($slide) {
		
					Slide::destroy($slide->id);

				});
	

				if(file_exists(url($slide->Slider_image) ) ) {

					unlink( url($slide->Slider_image) );
				}
			}


		return redirect()->back()->withFlashSuccess('Slider deleted successfully.');
	}

	/**
	 * Delete slide and slider(when needed).
	 * @param  [Integer]              $id      [Slide id]
	 * @param  deleteSliderRequest $request [description]
	 * @return [type]                       [rediect]
	 */
	public function slide_delete($id,deleteSliderRequest $request)
	{
		$slide=Slide::findOrFail($id);
		$title=$slide->title;	    	
		
		Slide::destroy($id);

		if(file_exists($slide->Slider_image)){
			unlink($slide->Slider_image);

		}

		$slide=Slide::where('title','=',$title)->first();
		
		if ( $slide === null  ) {

			return redirect()->action('Backend\SliderController@index')->withFlashSuccess('Slide deleted successfully');	
		}

		return redirect()->back()->withFlashSuccess('Slide deleted successfully.'); 
	}


    /**
	 * Make a Filepath for file
	 * 
	 * @return String
	 * 
	 */
    protected function Upload_and_GetFilepath(UploadedFile $file, $filename)
    {
    	$Filepath=$this->baseDir_Slide."/".$filename;

    	$file->move($this->baseDir_Slide,$filename);	

    	return $Filepath;
    }
}
