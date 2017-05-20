<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Datatables;
use App\Models\Page;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\Backend\Page\CreatePageRequest;
use App\Http\Requests\Backend\Page\DeletePageRequest;
use App\Http\Requests\Backend\Page\StatusPageRequest;
use App\Http\Requests\Backend\Page\UpdatePageRequest;


/**
 * Class PageController.
 */
class PageController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.pages.index');
    }

    public function load(){
        $pages = Page::select('id', 'title', 'slug', 'status', 'created_at', 'updated_at');
        return Datatables::of($pages)
            ->escapeColumns(['title', 'slug'])
            ->addColumn('bulk', function ($data) {
                return bulkSelect($data->id);
            })
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
                return crudOps('pages', $data->id);
                // return '<ul class="list-inline no-margin-bottom"><li><a href="'.route('admin.pages.edit', $data->id).'" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a></li><li><a href="'.route('admin.pages.destroy', $data->id).'" data-method="delete" name="delete_item" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i> Delete</a></li></ul>';
            })
            ->make(true);
    }

    public function create(CreatePageRequest $request){
    	return view('backend.pages.create');
    }

    public function store(CreatePageRequest $request){
        $this->validate($request,[
            'title' => 'required',
            'status' => 'required',
            'slug' => 'unique:pages,slug',
            ]);
        DB::transaction(function () use ($request) {
            if (empty($request->slug)) {
               $slug = generateUniqueSlug('App\Models\Page', $request->title);
            }else{
                $slug = $request->slug;
            }
            Page::create([
                'title' => $request->title,    
                'slug' => $slug,    
                'content' => $request->content,    
                'status' => $request->status,    
                'slider' => $request->slider,    
                'meta_title' => $request->meta_title,    
                'meta_keyword' => $request->meta_keyword,    
                'meta_desc' => $request->meta_desc,    
                ]);
        });

        return redirect()->route('admin.pages.index')->withFlashSuccess('Page created successfully.');
    }

    public function edit($id, UpdatePageRequest $request){
        $page = Page::findOrFail($id);
        return view('backend.pages.edit',compact('page'));
    }

    public function update($id, UpdatePageRequest $request){
        $this->validate($request,[
            'title' => 'required',
            'status' => 'required',
            'slug' => 'unique:pages,slug,'.$id,
            // 'slug' => [
            //     'sometime',
            //     Rule::unique('pages')->ignore($id),
            //     ],
            ]);
        $page = Page::findOrFail($id);
        DB::transaction(function () use ($request, $page) {
            if (empty($request->slug)) {
               $slug = generateUniqueSlug('App\Models\Page', $request->title);
            }else{
                $slug = $request->slug;
            }
            $page->update([
                'title' => $request->title,    
                'slug' => $slug,    
                'content' => $request->content,    
                'status' => $request->status,    
                'slider' => $request->slider,    
                'meta_title' => $request->meta_title,    
                'meta_keyword' => $request->meta_keyword,    
                'meta_desc' => $request->meta_desc,    
                ]);
        });
        // return redirect('/admin/pages')->withFlashSuccess('Page updated successfully.');
        return redirect()->back()->withFlashSuccess('Page updated successfully.');
    }

    public function destroy($id, DeletePageRequest $request){
        DB::transaction(function () use ($id) {
            Page::destroy($id);
        });
        return redirect()->back()->withFlashSuccess('Page deleted successfully.');
    }


    /**
     * Remove bulk pages form storage.
     *
     * @param  App\Http\Requests\Backend\Product\DeletePageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function deletePages(DeletePageRequest $request)
    {
        if (empty($request->ids)) {
            return redirect('/admin/pages')->withFlashDanger('Please select pages to delete.');
        }

        DB::transaction(function() use ($request){
            $ids = explode(',', $request->ids);
            foreach ($ids as $key => $id) {
                $product = Page::findOrFail($id);
                $product->delete();
            }
        });
        return redirect('/admin/pages')->withFlashSuccess('Pages deleted successfully.');
    }
    

}
