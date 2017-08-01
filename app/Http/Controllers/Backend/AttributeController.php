<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Attribute\CreateAttributeRequest;
use App\Http\Requests\Backend\Attribute\DeleteAttributeRequest;
use App\Http\Requests\Backend\Attribute\UpdateAttributeRequest;
use App\Models\Attribute\Attribute;
use Datatables;
use Illuminate\Http\Request;
use DB;
use Auth;

class AttributeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.attributes.index');
    }

    /**
     * ajax loading of attributes name.
     *
     * @return \Illuminate\Http\Response
     */
    public function load(){
        $attributes = Attribute::select('id', 'name', 'created_at', 'updated_at', 'status');
        return Datatables::of($attributes)
            ->escapeColumns(['name'])
            ->addColumn('bulk', function ($data) {
                return bulkSelect($data->id);
            })
            ->addColumn('name', function($data){
                return $data->name;
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
                return crudOps('attributes', $data->id);
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  App\Http\Requests\Backend\Product\CreateAttributeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateAttributeRequest $request)
    {
        return view('backend.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Backend\Product\CreateAttributeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAttributeRequest $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => 'required',            
            'status' => 'required',            
            'attr_type' => 'required',            
            'attr_order' => 'required',            
        ]);
// return "here";
        DB::transaction(function() use ($request){
            $attribute = Attribute::create([
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'attr_type' => $request->attr_type,
                'attr_order' => $request->attr_order,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);
            for ($i=0; $i < count($request->value); $i++) { 
                $attribute->attributesValues()->create([
                    'value' => $request->value[$i],
                    'value_order' => $request->value_order[$i],
                    'value_status' => $request->value_status[$i],
                    'user_id' => Auth::user()->id,
                ]);
            }

        });// end of transaction

        return redirect('admin/attributes')->withFlashSuccess('Attribute and Values stored successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Http\Requests\Backend\Product\UpdateAttributeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UpdateAttributeRequest $request)
    {
        $attribute = Attribute::findOrFail($id);
        return view('backend.attributes.edit',compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Backend\Product\UpdateAttributeRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateAttributeRequest $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => 'required',            
            'status' => 'required', 
            'attr_type' => 'required',            
            'attr_order' => 'required', 
        ]);

        DB::transaction(function() use ($request, $id){

            $attribute = Attribute::findOrFail($id);
            $attribute->update([
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'attr_type' => $request->attr_type,
                'attr_order' => $request->attr_order,
                'status' => $request->status,
                'user_id' => Auth::user()->id,
            ]);

            $prevAttrValues = $attribute->attributesValues;
            $prevAttrValCount = count($prevAttrValues);
            $attrValCount = count($request->value);
            $i = 0;
            if ($prevAttrValCount <= $attrValCount) {
                while ($i < $prevAttrValCount) {
                    $prevAttrValues[$i]->update([
                        'value' => $request->value[$i],
                        'value_order' => $request->value_order[$i],
                        'value_status' => $request->value_status[$i],
                        'user_id' => Auth::user()->id,
                    ]);
                    $i++;
                }
                while ($i < $attrValCount) {
                    $attribute->attributesValues()->create([
                        'value' => $request->value[$i],
                        'value_order' => $request->value_order[$i],
                        'value_status' => $request->value_status[$i],
                        'user_id' => Auth::user()->id,
                    ]);
                    $i++;
                }
            }else{
                while ($i < $attrValCount) {
                    $prevAttrValues[$i]->update([
                        'value' => $request->value[$i],
                        'value_order' => $request->value_order[$i],
                        'value_status' => $request->value_status[$i],
                        'user_id' => Auth::user()->id,
                    ]);
                    $i++;
                }
                while ($i < $prevAttrValCount) {
                    $prevAttrValues[$i]->delete();
                    $i++;
                }
            }

        });

        return redirect()->back()->withFlashSuccess('Attribute and Values updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  App\Http\Requests\Backend\Product\DeleteAttributeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, DeleteAttributeRequest $request)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return redirect('/admin/attributes')->withFlashSuccess('Attribute and Values deleted successfully.');
    }

       /**
     * Remove bulk products form storage.
     *
     * @param  App\Http\Requests\Backend\Product\DeleteProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAttributes(DeleteAttributeRequest $request)
    {
        if (empty($request->ids)) {
            return redirect('/admin/attributes')->withFlashDanger('Please select attributes to delete.');
        }

        DB::transaction(function() use ($request){
            $ids = explode(',', $request->ids);
            foreach ($ids as $key => $id) {
                $attribute = Attribute::findOrFail($id);
                $attribute->delete();
            }
        });
        return redirect('/admin/attributes')->withFlashSuccess('Attributes and values deleted successfully.');
    }


}
