<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use Validator;
use App\Models\Page;
use App\Models\Staticblock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Staticblock\CreateBlockRequest;
use App\Http\Requests\Backend\Staticblock\EditBlockRequest;
use App\Http\Requests\Backend\Staticblock\DeleteBlockRequest;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class StaticblockController extends Controller
{
    
    /**
     * Base Directory to upload images.
     * @var string
     */
    protected $baseDir="images/Static-blocks";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.staticblocks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateBlockRequest $request)
    {
        $page = Page::where('status', 1)->pluck('title', 'id');
        $page->prepend('--Select--', '');
        return view('backend.staticblocks.create',compact('page'));
    }

    /**
     * load datatable for staticblocks-table
     * @return [columns] [datatable data]
     */
    public function load()
    {

        $blocks=Staticblock::select('page')->groupBy('page')->get();
                
        return Datatables::of($blocks)
        
        ->editColumn('page',function($data){
            $page=Page::findOrFail($data->page);
            return ($page->title);
         })

        ->addColumn('action',function($data){
            return crudOps_for_staticblock('static_blocks',$data->page);
        })
        ->make(true);
    }

    /**
     * load datatable for slide-list-table
     * @return [type] [description]
     */
    public function load_staticblock_list(Request $request)
    {   
        
        
        $blocks=Staticblock::where('page',$request->page_id)->get();

        return Datatables::of($blocks)
        ->escapeColumns(['id','title','identifier','feature_image'])

        ->editColumn('created_at',function($data){
           return parseDateTimeY_M_D($data->created_at);
          })
        ->editColumn('updated_at',function($data){
           return parseDateTimeY_M_D($data->updated_at);
          })
        ->editColumn('status',function($data){
            return parseStatus($data->status);
          })

        ->addColumn('action',function($data){
            return crudOps('static_blocks',$data->id);
        })
        ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBlockRequest $request)
    {
        //return $request->BgColor[0];
        //return $request->all();
        #$page=Page::findOrFail($request->page);
        $files_feature    = $request->file('feature_image');
        $files_background = $request->file('Background_image');

        foreach ($request->count as $key => $input) {


                $filepath_feature[$key]=$this->getFilename($files_feature[$key]);
                $filepath_background[$key]=$this->getFilename($files_background[$key]);

           
                DB::transaction(function() use($request,$filepath_feature,$filepath_background,$key)
                {
                        Staticblock::create([
                            'title'=>$request->title[$key],
                            'identifier'=>$request->identifier[$key],
                            'url'=>$request->url[$key],
                            'content'=>$request->content[$key],
                            'bgcolor'=>$request->BgColor[$key],
                            'bgimage'=>$filepath_background[$key],
                            'page'=>$request->page,
                            'feature_image'=>$filepath_feature[$key],
                            'status'=>$request->status[$key],
                            'position'=>$request->position[$key],
                            's_order'=>$request->s_order[$key],               
                            ]);         
                 });
            
        }

    // if ( $page === null ) {
                
                    return view('backend.staticblocks.index')->withFlashSuccess('Static-block created successfully.');
                // }
                // else{

                //     return redirect(url('admin/sliders/'.$request->title.'/list'))->withFlashSuccess('Slides added successfully.');
                
                // }   
    }


    public function staticblocks_list($page_id,Request $request)
    {
         $page = Page::find($page_id);
         $title=$page->title;
        return  view('backend.staticblocks.list',compact('page_id','title'));
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,EditBlockRequest $request)
    {   
        $static_block=Staticblock::findOrFail($id);
        $page = Page::where('status', 1)->pluck('title', 'id');
        $page->prepend('--Select--', '');
        return view('backend.staticblocks.edit',compact('static_block','page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id,EditBlockRequest $request)
    {
        return "ok";
    }


    public function static_block_delete($id,DeleteBlockRequest $request)
    {
        return "ok";
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,DeleteBlockRequest $request)
    {
        return "de oK";
    }

     
    protected function getFilename(UploadedFile $file)
    {
         if ( !empty($file) ){

            $filename=time().$file->getClientOriginalName();
            $filepath=$this->Upload_and_GetFilepath($file,$filename);
            }
            else
            {
                $filepath='No static-block';
            }

        return $filepath;        

    }

     /**
     * Make a Filepath for file
     * 
     * @return String
     * 
     */
    protected function Upload_and_GetFilepath(UploadedFile $file, $filename)
    {
        $Filepath=$this->baseDir."/".$filename;

        $file->move($this->baseDir,$filename);    

        return $Filepath;
    }
}
