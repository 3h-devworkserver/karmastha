<?php namespace App\Http\Requests\Backend\ProductGroup;

use App\Http\Requests\Request;

/**
 * Class DeleteProductGroupRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class DeleteProductGroupRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return access()->allow('delete-productgroups');
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