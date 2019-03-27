<?php

namespace Bestmomo\Installer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\Frontend\Auth\RegisterRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{

    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * RegisterController constructor.
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
      $this->user = $user;
    }

    /**
     * Show form.
     *
     * @return \Illuminate\View\View
     */
    public function createUser()
    {
        $fields = config('installer.fields');

        return view('vendor.installer.register', compact('fields'));
    }

    /**
     * Manage form submission.
     *
     * @param  Illuminate\Http\Request $request
     * @return
     */
    public function storeUser(RegisterRequest $request)
    {

      $this->user->createInstall($request->all());
      return redirect('install/end');
    }

}
