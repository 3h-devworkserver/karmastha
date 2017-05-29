<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Member;
use App\Models\Page;
use App\Models\Slide;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    public function __construct(){
       parent::__construct();
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $brands = Brand::where('status', 1)->where('topbrand', 1)->orderBy('b_order', 'asc')->get();
        $members = Member::where('status', 1)->orderBy('m_order', 'asc')->get();
        $page = Page::where('id',1)->where('status', 1)->first();
        $sliders= Slide::where('group_identifier', $page->slider_identifier)->get();
        if (empty($page)) {
            abort(404);
        }
        return view('frontend.index', compact('brands', 'members', 'sliders', 'page'))->withClass('home');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function macros()
    {
        return view('frontend.macros');
    }
}
