<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use DB;
use File;

class SettingController extends Controller
{
    /**
     * General Settings form.
     *
     * @return \Illuminate\Http\Response
     */
    public function generalSetting()
    {
        $setting = GeneralSetting::first();
        if(empty($setting)){
            return view('backend.settings.generalsettingcreate');
        }
        return view('backend.settings.generalsettingedit', compact('setting'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGeneralSetting(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'email' => 'required|email',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_desc' => 'required',
            'uploadLogo' => 'image',
            'uploadFavicon' => 'mimes:jpeg,bmp,png,ico',
            ]);

        $setting = GeneralSetting::first();
        $exists = 'true';
        if(empty($setting)){
            $exists = 'false';
            $setting = new GeneralSetting;
            $filenameLogo = '';
            $filenameFavicon = '';
        }
        $filenameLogo = $setting->logo;
        $filenameFavicon = $setting->favicon;

        if ($request->hasFile('uploadLogo')) {
        	$file= $request->file('uploadLogo');
        	$destination_path = 'images/logo';
        	$filenameLogo = str_random(5).'-'.$file->getClientOriginalName();
        	$move = $file->move($destination_path, $filenameLogo);
        	if ($move) {
			    if (!empty($setting->logo)) {
			        if (File::exists('images/logo/'. $setting->logo)) {
			          unlink('images/logo/'.$setting->logo);
			      	}
			  	}            
			}

        }
        if ($request->hasFile('uploadFavicon')) {
        	$file= $request->file('uploadFavicon');
        	$destination_path = 'images/logo/favicon';
        	$filenameFavicon = str_random(5).'-'.$file->getClientOriginalName();
        	$move = $file->move($destination_path, $filenameFavicon);
        	if ($move) {
			    if (!empty($setting->favicon)) {
			        if (File::exists('images/logo/favicon/'. $setting->favicon)) {
			          unlink('images/logo/favicon/'.$setting->favicon);
			      	}
			  	}            
			}
        }

		DB::transaction(function () use ($exists, $request, $setting, $filenameLogo, $filenameFavicon) {
	        if($exists == 'false'){
                GeneralSetting::create([
                    'title' => $request->title,
                    'tagline' => $request->tagline,
                    'email' => $request->email,
                    'meta_title' => $request->meta_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_desc' => $request->meta_desc,
                    'misc_javascript' => $request->misc_javascript,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'google_plus' => $request->google_plus,
                    'pinterest' => $request->pinterest,
                    'logo' => $filenameLogo,
                    'favicon' => $filenameFavicon,
                ]);
            }else{
                $setting->update([
    	        	'title' => $request->title,
    	        	'tagline' => $request->tagline,
    	        	'email' => $request->email,
    	        	'meta_title' => $request->meta_title,
    	        	'meta_keyword' => $request->meta_keyword,
    	        	'meta_desc' => $request->meta_desc,
    	        	'misc_javascript' => $request->misc_javascript,
    	        	'facebook' => $request->facebook,
    	        	'twitter' => $request->twitter,
    	        	'youtube' => $request->youtube,
    	        	'google_plus' => $request->google_plus,
    	        	'pinterest' => $request->pinterest,
    	        	'logo' => $filenameLogo,
    	        	'favicon' => $filenameFavicon,
    	        ]);
            }
	       });
		return redirect()->back()->withFlashSuccess('General settings updated Successfully.');
    }
    
}
