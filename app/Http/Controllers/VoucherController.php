<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vouchers;
use Illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    public function store(Request $request){
        $voucher = new Vouchers();
        $voucher->product_id = $request->input('id');
        $voucher->seller_id = $request->input('seller_id');
        $voucher->company = $request->input('company');
        $voucher->product_name = $request->input('name');
        $voucher->product_code = $request->input('product_code');
        $voucher->quantity = $request->input('quantity');
        $voucher->message = $request->input('message');
        $voucher->save();

        return back()->with('status','sent successfully');
    }

    public function display(){
        $vendor_id= Auth::user()->id;
        $vouchers = Vouchers::where('seller_id', $vendor_id)->get();
        return view('vouchers.vouchersFromAdmin',compact('vouchers'));
    }

}
