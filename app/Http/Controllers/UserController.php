<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    public function index($id){
        $userInfo = User::findOrFail($id);
        return view('User.Profile',compact('userInfo'));
    }

    public function update(Request $request, $id){
        $userInfo = User::findOrFail($id);
        $userInfo->name = $request->input('name');
        $userInfo->contact = $request->input('contact');
        $userInfo->alt_contact = $request->input('alt_cont');
        $userInfo->address = $request->input('address');
        $userInfo->city = $request->input('city');
        $userInfo->zip_code = $request->input('zip');

        $userInfo->save();
        return redirect('/home')->with('status','Successfully updated');

    }

    public function customers(){
        $customers = User::where('role_as', NULL)->get();
        return view('User.Customers.AllCustomer',compact('customers'));

    }

    public function removeCustomer($id){
        $customers = User::find($id);
        $customers->delete();
        return view('User.Customers.AllCustomer',compact('customers'));
    }
}
