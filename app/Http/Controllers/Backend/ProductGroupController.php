<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductGroup\CreateProductGroupRequest;
use App\Http\Requests\Backend\ProductGroup\UpdateProductGroupRequest;
use App\Http\Requests\Backend\ProductGroup\DeleteProductGroupRequest;
use App\Models\ProductGroup\ProductGroup;
use DB;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


/**
 * Class ProductGroupController.
 */
class ProductGroupController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.productgroups.index');
    }

    public function load(){
        $productgroups = ProductGroup::select('id', 'title', 'status', 'created_at', 'updated_at');
        return Datatables::of($productgroups)
            ->escapeColumns(['title'])
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
                return crudOps('productgroups', $data->id);
                // return '<ul class="list-inline no-margin-bottom"><li><a href="'.route('admin.pages.edit', $data->id).'" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a></li><li><a href="'.route('admin.pages.destroy', $data->id).'" data-method="delete" name="delete_item" class="btn btn-danger"><i class="fa fa-pencil-square-o"></i> Delete</a></li></ul>';
            })
            ->make(true);
    }

    public function create(CreateProductGroupRequest $request){
        
    	return view('backend.productgroups.create');
    }

    public function store(CreateProductGroupRequest $request){
        $this->validate($request,[
            'title' => 'required|unique:productgroups,title',
            'status' => 'required',
            ]);
        DB::transaction(function () use ($request) {
            
            ProductGroup::create([
                'title' => $request->title,    
                'short_desc' => $request->short_desc,    
                'status' => $request->status,    
                ]);
        });

        return redirect()->route('admin.productgroups.index')->withFlashSuccess('Product Group created successfully.');
    }

    public function edit($id, UpdateProductGroupRequest $request){
        $productGroup = ProductGroup::findOrFail($id);
        return view('backend.productgroups.edit',compact('productGroup'));
    }

    public function update($id, UpdateProductGroupRequest $request){
        $this->validate($request,[
            'title' => 'required||unique:productgroups,title,'.$id,
            'status' => 'required',
            ]);
        $productGroup = ProductGroup::findOrFail($id);
        DB::transaction(function () use ($request, $productGroup) {
            $productGroup->update([
                'title' => $request->title,    
                'short_desc' => $request->short_desc,    
                'status' => $request->status, 
                ]);
        });
        return redirect()->back()->withFlashSuccess('Product Group updated successfully.');
    }

    public function destroy($id, DeleteProductGroupRequest $request){
        DB::transaction(function () use ($id) {
            ProductGroup::destroy($id);
        });
        return redirect()->back()->withFlashSuccess('Product Group deleted successfully.');
    }


    /**
     * Remove bulk Product Group form storage.
     *
     * @param  App\Http\Requests\Backend\Product\DeleteProductGroupRequest $request
     * @return \Illuminate\Http\Response
     */
    public function deleteProductGroups(DeleteProductGroupRequest $request)
    {
        if (empty($request->ids)) {
            return redirect('/admin/productgroups')->withFlashDanger('Please select product groups to delete.');
        }

        DB::transaction(function() use ($request){
            $ids = explode(',', $request->ids);
            foreach ($ids as $key => $id) {
                $productGroup = ProductGroup::findOrFail($id);
                $productGroup->delete();
            }
        });
        return redirect('/admin/productgroups')->withFlashSuccess('Product Groups deleted successfully.');
    }
    

}
