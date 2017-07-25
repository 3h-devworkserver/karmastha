<?php

namespace App\Http\Controllers\Backend;

use DB;
use File;
use Datatables;
use App\Models\Ads;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\Backend\Ads\CreateAdsRequest;
use App\Http\Requests\Backend\Ads\EditAdsRequest;
use App\Http\Requests\Backend\Ads\DeleteAdsRequest;

class AdsController extends Controller
{

    protected $baseDir="images/ads";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('backend.ads.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $ads = Ads::first();
        if(empty($ads)){
            return view('backend.ads.create');
        }else{            
            return view('backend.ads.edit', compact('ads'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdsRequest $request)
    {
           $ads = Ads::first();
           if(!empty($ads)){
            $msg = "Ads Updated Successfully";
           }else{
            $msg = "Ads Created Successfully";
           }
           DB::transaction(function() use($request, $ads){

            
            if( count($ads) > 0 ){

                $file= $request->file('logo');
                if(!empty($file)){
                    if (File::exists($ads->first_image)) {
                      unlink($ads->first_image);
                    }
                $filename=$this->makeFileName($file);
                $filepath=$this->Upload_and_GetFilepath($file,$filename);
                }else{
                    $filepath = $ads->first_image;
                }

                $file1= $request->file('logo1');
                if(!empty($file1)){
                    if (File::exists($ads->second_image)) {
                      unlink($ads->second_image);
                    }
                $filename1=$this->makeFileName($file1);
                $filepath1=$this->Upload_and_GetFilepath($file1,$filename1);
                }else{
                    $filepath1 = $ads->second_image;
                }
                
                $file2= $request->file('logo2');
                if(!empty($file2)){
                    if (File::exists($ads->third_image)) {
                      unlink($ads->third_image);
                    }
                $filename2=$this->makeFileName($file2);
                $filepath2=$this->Upload_and_GetFilepath($file2,$filename2);
                }else{
                    $filepath2 = $ads->third_image;
                }
                
                $file3= $request->file('logo3');
                if(!empty($file3)){
                    if (File::exists($ads->fourth_image)) {
                      unlink($ads->fourth_image);
                    }
                $filename3=$this->makeFileName($file3);
                $filepath3=$this->Upload_and_GetFilepath($file3,$filename3);
                }else{
                    $filepath3 = $ads->fourth_image;
                }
                
                $file4= $request->file('logo4');
                if(!empty($file4)){
                    if (File::exists($ads->fifth_image)) {
                      unlink($ads->fifth_image);
                    }
                $filename4=$this->makeFileName($file4);
                $filepath4=$this->Upload_and_GetFilepath($file4,$filename4);
                }else{
                    $filepath4 = $ads->fifth_image;
                }

                $ad = $ads->update([
                'first_image'=>$filepath,
                'second_image'=>$filepath1,
                'third_image'=>$filepath2,
                'fourth_image'=>$filepath3,
                'fifth_image'=>$filepath4,
                ]);
            }else{ 
            $file= $request->file('logo');
            $filename=$this->makeFileName($file);
            $filepath=$this->Upload_and_GetFilepath($file,$filename);

            $file1= $request->file('logo1');
            $filename1=$this->makeFileName($file1);
            $filepath1=$this->Upload_and_GetFilepath($file1,$filename1);
            
            $file2= $request->file('logo2');
            $filename2=$this->makeFileName($file2);
            $filepath2=$this->Upload_and_GetFilepath($file2,$filename2);
            
            $file3= $request->file('logo3');
            $filename3=$this->makeFileName($file3);
            $filepath3=$this->Upload_and_GetFilepath($file3,$filename3);
            
            $file4= $request->file('logo4');
            $filename4=$this->makeFileName($file4);
            $filepath4=$this->Upload_and_GetFilepath($file4,$filename4);                       
                $ad = Ads::create([
                'first_image'=>$filepath,
                'second_image'=>$filepath1,
                'third_image'=>$filepath2,
                'fourth_image'=>$filepath3,
                'fifth_image'=>$filepath4,
                ]);

               
            }
            
        });

        return redirect()->route('admin.ads')->withFlashSuccess($msg);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
