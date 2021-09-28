<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class VendorController extends Controller

{

    public function index(){
        return view('Vendors.VendorRegistration');
    }
    public function showVendors(){
    $vendors = DB::table('users')->where('role_as','vendor')->get();
        return view('Vendors.VendorsList',compact('vendors'));

    }



    protected function createVendor(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_as = $request->input('role_as');
        $user->password = Hash::make($request->input('password'));

        $user->save();
       /* User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_as' =>$request->role_as,
            'password' => Hash::make($request->password),
        ]);*/
        return redirect()->intended('Dashboard');
    }

    public function destroy($id)
        {
            $vendors = User::find($id);
            $vendors->delete();
            return redirect('/vendorPage')->with('vendors',$vendors);
        }

}
