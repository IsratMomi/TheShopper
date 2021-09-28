<?php

namespace App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use phpDocumentor\Reflection\Types\Null_;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;
/* public function redirectTo(){
    if(Auth::user()->role_as == 'admin'){
        return 'Dashboard';
    }
    elseif(Auth::user()->role_as == 'vendor'){
        return 'VendorDashboard';
    }
    else{
        return '/';
    }
 }*/

 public function authenticated(){

    if(Auth::user()->role_as == 'admin'){
        return redirect('Dashboard')->with('status','Welcome to dashboard');
    }
    elseif(Auth::user()->role_as == 'vendor'){
        return redirect('VendorDashboard')->with('status','Welcome to dashboard');
    }
    elseif(Auth::user()->role_as == NULL){
        return redirect('/home')->with('status','Welcome to dashboard');;
    }

 }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

}


