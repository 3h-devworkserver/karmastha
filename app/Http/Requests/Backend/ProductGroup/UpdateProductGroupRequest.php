<?php namespace App\Http\Requests\Backend\ProductGroup;

use App\Http\Requests\Request;

/**
 * Class UpdateProductGroupRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class UpdateProductGroupRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('edit-productgroups');
	}

		/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			//
		];
	}

	
}