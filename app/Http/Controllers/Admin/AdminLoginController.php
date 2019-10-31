<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
     use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';



       public function __construct()
       {
           $this->middleware('guest:admin')->except('logout');
       }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('Admin.auth.login');
    }


    public function loginAdmin(Request $request)
    {

      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);


      if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->intended(route('admin.dashboard'));
      }
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }
}
