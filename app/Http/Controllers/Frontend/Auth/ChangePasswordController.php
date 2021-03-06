<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Http\Requests\Frontend\User\ChangePasswordRequest;
use Illuminate\Http\Request;

/**
 * Class ChangePasswordController.
 */
class ChangePasswordController extends Controller
{
    /**
   * @var UserRepository
   */
  protected $user;
  

  /**
   * ChangePasswordController constructor.
   *
   * @param UserRepository $user
   */
  public function __construct(UserRepository $user)
  {
      $this->user = $user;
       parent::__construct();
  }

  /**
   * @param ChangePasswordRequest $request
   *
   * @return mixed
   */
  public function formPassword()
  {
     // $this->user->changePassword($request->all());

      return view('frontend.user.password')->withClass('password-change');
  }

  public function changePassword(Request $request)
  {
    // return "hjhjh";
      $this->user->changePassword($request->all());

      return redirect()->route('frontend.auth.password')->withFlashSuccess(trans('strings.frontend.user.password_updated'));
  }
}
