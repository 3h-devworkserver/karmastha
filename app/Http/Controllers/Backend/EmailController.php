<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function activateUser()
    {
    	$content=file_get_contents(base_path().'/resources/views/emails/activateemail.blade.php');
    	if(empty($content)){
    		return view('backend.emails.activateemail.create');
    	}
    	else
    	{
    		return view('backend.emails.activateemail.edit',compact('content'));

    	}
    }

    public function activateUserstore(Request $request)
    {
    	$this->validate($request, [
        'content' => 'required',
    	]);

    	$content= file_put_contents(base_path().'/resources/views/emails/activateemail.blade.php',$request->content);
    	return back();

    }
}
