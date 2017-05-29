<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Models\Member;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Requests\Backend\Member\createMemberRequest;
use App\Http\Requests\Backend\Member\updateMemberRequest;
use App\Http\Requests\Backend\Member\deleteMemberRequest;



class MemberManagementController extends Controller
{

	/**
     * Base Directory to upload images.
     * @var string
     */
    protected $baseDir="images/member_logo";


    public function index()
    {
    	return view('backend.members.index');
    }

    /**
     * load content to datatable.
     * @return [json ] [contents for datatable of members.]
     */
     public function load(){
        $members = Member::select('id', 'name', 'logo', 'url','status', 'created_at', 'updated_at');
        return Datatables::of($members)
            ->escapeColumns(['name','url','logo'])
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
                return parseStatus($data->status);
            })
            ->addColumn('action', function($data){
                return crudOps('members', $data->id);
                
            })
            ->make(true);
    }

    /**
     * Create new member
     * @return [view] [create.blade.php]
     */
    public function create(createMemberRequest $request)
    {
    	return view('backend.members.create');
    }


    /**
     * Store created member.
     * @param  Request $request [form contents]
     * @return [view]           [index.blade.php]
     */
    public function store(createMemberRequest $request)
    {
    	$this->validate($request,[
            'Name' => 'required',
            'status' => 'required',
            'logo' => 'required',
            'url'=>'required',
            'm_order'=>'required',
            ]);


    	DB::transaction(function() use($request){
    		$file= $request->file('logo');
            $filename=$this-> makeFileName($file);
            $filepath=$this->Upload_and_GetFilepath($file,$filename);
            
    		Member::create([
    			'Name'=>$request->Name,
    			'logo'=>$filepath,
    			'url'=>$request->url,
                'm_order'=>$request->m_order,
    			'status'=>$request->status,
    			]);
    	});

    	return redirect()->route('admin.members.index')->withFlashSuccess('Member created successfully.');
    }


    /**
     * [Edit Member Model]
     * @param  [type]  $id      [Id of model member]
     * @param  Request $request [description]
     * @return [view]           [edit]
     */
    public function edit($id,updateMemberRequest $request )
    {

	 $member = Member::findOrFail($id);
     return view('backend.members.edit',compact('member'));
    
	}
	
	/**
	 * Update the Member model
	 * @param  [type]  $id      [id of member]
	 * @param  Request $request [updated contents]
	 * @return [type]           [description]
	 */
	public function update($id, updateMemberRequest $request)
	{
    	$this->validate($request,[
            'Name' => 'required',
            'status' => 'required',
            'url'=>'required',
            'm_order'=>'required',
            ]);

    	$member=Member::findOrFail($id);


    	DB::transaction(function() use($request,$member){

	    	if ($request->hasFile('logo')) {

                if(file_exists($member->logo)){
                     unlink($member->logo);
                 }

	    		$file= $request->file('logo');
	            $filename=$this-> makeFileName($file);
	            $filepath=$this->Upload_and_GetFilepath($file,$filename);
				

				$member->update([
	    		'logo'=>$filepath,
	    		]) ;    		

	    	}

			$member->update([
			'Name'=>$request->Name,
			'url'=>$request->url,
			'status'=>$request->status,
            'm_order'=>$request->m_order,   		
			]) ;

    	});

    	return redirect()->back()->withFlashSuccess('Member Info updated successfully.');
	}


    /**
     * Destroy Member
     * @param  [type]              $id      [description]
     * @param  deleteMemberRequest $request [description]
     * @return [type]                       [description]
     */
	public function destroy($id, deleteMemberRequest $request){
        DB::transaction(function () use ($id) {
            $member=Member::findOrFail($id);
            
            if(file_exists($member->logo)){
                unlink($member->logo);
            }
            
            Member::destroy($id);
        });

        return redirect()->back()->withFlashSuccess('Member deleted successfully.');
    }

    /**
     * Bulk Delete
     * @param  deleteMemberRequest $request [description]
     * @return [type]                       [description]
     */
    public function deleteMembers(deleteMemberRequest $request)
    {
        if (empty($request->ids)) {
            return redirect('/admin/members')->withFlashDanger('Please select members to delete.');
        }

        DB::transaction(function() use ($request){
            $ids = explode(',', $request->ids);
            foreach ($ids as $key => $id) {
                $member = Member::findOrFail($id);
                
                if(file_exists($member->logo)){
                    unlink($member->logo);
                }
                
                $member->delete();
            }
        });
        return redirect('/admin/members')->withFlashSuccess('Members deleted successfully.');
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
