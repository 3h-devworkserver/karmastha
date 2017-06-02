<?php

namespace App\Http\Controllers\Backend;

use DB;
use Datatables;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\Backend\Brand\CreateBrandRequest;
use App\Http\Requests\Backend\Brand\EditBrandRequest;
use App\Http\Requests\Backend\Brand\DeleteBrandRequest;


class BrandController extends Controller
{

    /**
     * Base Directory to upload images.
     * @var string
     */
    protected $baseDir="images/brand_logo";


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.brands.index');
    }


    /**
     * load content to datatable.
     * @return [json ] [contents for datatable of members.]
     */
     public function load(){
        $brands = Brand::select('id', 'brand_name', 'brand_logo', 'slug','status', 'created_at', 'updated_at');
        return Datatables::of($brands)
            ->escapeColumns(['brand_name','slug','brand_logo'])
            ->addColumn('bulk', function ($data) {
                return bulkSelect($data->id);
            })
            ->editColumn('status', function ($data) {
                return parseStatus($data->status);
            })
             ->editColumn('created_at', function($data){ 
                return parseDateTimeY_M_D($data->created_at) ;
             })
             ->editColumn('updated_at', function($data){ 
                 return parseDateTimeY_M_D($data->updated_at) ;
             })
            ->addColumn('action', function($data){
                return crudOps('brands', $data->id);
                
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateBrandRequest $request)
    {
        return view('backend.brands.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBrandRequest $request)
    {

        $this->validate($request,[
            'brand_name' => 'required',
            'status' => 'required',
            'brand_logo' => 'required',
            'slug'=>'required',
            'b_order'=>'required',
            'topbrand'=>'required',
            ]);


        DB::transaction(function() use($request){
            $file= $request->file('brand_logo');
            $filename=$this-> makeFileName($file);
            $filepath=$this->Upload_and_GetFilepath($file,$filename);
            
            $brand = Brand::create([
                'brand_name'=>$request->brand_name,
                'brand_logo'=>$filepath,
                'slug'=>$request->slug,
                'status'=>$request->status,
                'b_order'=>$request->b_order,
                'topbrand'=>$request->topbrand,
                ]);

            //categorys associated with brand
            $brand->categorys()->attach($request->category);
        });

        return redirect()->route('admin.brands.index')->withFlashSuccess('Brand created successfully.');
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
    public function edit($id,EditBrandRequest $request)
    {

        $brand = Brand::findOrFail($id);
        $catSelected = $brand->categorys;
        $catSelected = $catSelected->pluck('id');
        return view('backend.brands.edit',compact('brand', 'catSelected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditBrandRequest $request, $id)
    {
       
        $this->validate($request,[
            'brand_name' => 'required',
            'status' => 'required',
            'slug'=>'required',
            'b_order'=>'required',
            'topbrand'=>'required',
            ]);

        $brand=Brand::findOrFail($id);


        DB::transaction(function() use($request,$brand){

            if ($request->hasFile('brand_logo')) {

                if(file_exists($brand->brand_logo)){
                     unlink($brand->brand_logo);
                 }

                $file= $request->file('brand_logo');
                $filename=$this-> makeFileName($file);
                $filepath=$this->Upload_and_GetFilepath($file,$filename);
                

                $brand->update([
                'brand_logo'=>$filepath,
                ]) ;            

            }

            $brand->update([
            'brand_name'=>$request->brand_name,
            'slug'=>$request->slug,
            'status'=>$request->status,
            'b_order'=>$request->b_order,
            'topbrand'=>$request->topbrand,         
            ]) ;

            //categorys associated with product
            $brand->categorys()->sync($request->category);

        });

        return redirect()->back()->withFlashSuccess('Brand Info updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,DeleteBrandRequest $request)
    {
         DB::transaction(function () use ($id) {
            $brand=Brand::findOrFail($id);
            
            if(file_exists($brand->brand_logo)){
                unlink($brand->brand_logo);
            }
            
            Brand::destroy($id);
        });

        return redirect()->back()->withFlashSuccess('Brand deleted successfully.');
    }

    /**
     * Bulk Delete
     * @param  DeleteBrandRequest $request [description]
     * @return [type]                      [description]
     */
    public function deleteBrands(DeleteBrandRequest $request)
    {
        
         if (empty($request->ids)) {
            return redirect('/admin/brands')->withFlashDanger('Please select brands to delete.');
        }

        DB::transaction(function() use ($request){
            $ids = explode(',', $request->ids);
            foreach ($ids as $key => $id) {
                $brand = Brand::findOrFail($id);
                
                if(file_exists($brand->brand_logo)){
                    unlink($brand->brand_logo);
                }
                
                $brand->delete();

            }
        });
        return redirect('/admin/brands')->withFlashSuccess('Brands deleted successfully.');
    }


    /**
     * Make a Filename for file
     * 
     * @return String
     * 
     */
    protected function makeFileName(UploadedFile $file)
    {

        $name=
            time().$file->getClientOriginalName();
            
        return "{$name}";

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

        if($file->move($this->baseDir,$filename)){
            return $Filepath;
        }
        else {
            return "upload fail";
        }
        
        
    }

}
