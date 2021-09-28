<?php

namespace App\Http\Controllers;

use App\Product;
use App\requestRestocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProductController extends Controller
{

    public function index(){
        return view('addProducts');
    }

    public function store(Request $request){
        $product = new Product();

        $product->name= $request->input('name');
        $product->Vendor_name= $request->input('Ven_name');
        $product->Vendor_id= $request->input('Ven_id');
        $product->Company_name= $request->input('Comp_name');
        $product->product_code= $request->input('product_code');
        $product->catagory= $request->input('catagory');
        $product->Type= $request->input('Type');
        $product->description= $request->input('description');
        $product->quantity= $request->input('quantity');
        $product->price= $request->input('price');

        if (request()->has('image')){
            $file = request()->file('image');
            $imgname = time() . '.' . $file->getClientOriginalExtension();
            $imgpath = public_path('/images/');
            $file->move($imgpath, $imgname);
            $product->image= $imgname;
        }
        else{
            return $request;
            $product->image = '';
        }

        $product->save();
        return view('addproducts')->with('product', $product);
    }

    public function display(){
        $product = Product::all();
        return view('Products.ProductAdminShow',compact('product'));
    }

    public function SeeProduct(){
        $user_id = Auth::user()->id;
        $product = DB::table('products')->where('Vendor_id',$user_id)->get();
        return view('Products.products',compact('product'));
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('productUpdate',compact('product'));
    }


        public function update(Request $request, $id){
           /* $validatedData = $request->validate([
                'id' => 'required|max:255',
                'name' => 'required|max:255',
                'product_code' => 'required|max:255',
                'catagory' => 'required',
                'Type' => 'required|max:255',
                'description' => 'required|max:255',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',

            ]);
            Product::whereId($id)->update($validatedData);

            return redirect('/products')->with('success', 'successfully updated');*/
            $product = Product::FindOrFail($id);
            $product->name= $request->input('name');

            $product->Company_name= $request->input('Comp_name');
            $product->product_code= $request->input('product_code');
            $product->catagory= $request->input('catagory');
            $product->Type= $request->input('Type');
            $product->description= $request->input('description');
            $product->quantity= $request->input('quantity');
            $product->price= $request->input('price');

        if ($request->has('image')){
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $imgname = time() . '.' . $extension;
            $imgpath = public_path('/images/');
            $file->move($imgpath, $imgname);
            $product->image= $imgname;

        }

        $product->save();
        return redirect('/productPage')->with('product',$product);

        }

        public function destroy($id)
        {
            $product = Product::find($id);
            $product->delete();
            return redirect('/productPage')->with('product',$product);
        }

        public function showProduct(){
            $product = Product::paginate(2);
            return view('productShow',compact('product'));
        }

        public function SingleProduct($id){
            $product = Product::findOrFail($id);
            return view('SingleView')->with('product',$product);

        }

        public function searchProduct(Request $request){
            $searchData = $request->search;
            $data = DB::table('products')
            ->where('name', 'like', '%'. $searchData . '%')
            ->orWhere('Type', 'like', '%' . $searchData . '%')
            ->orWhere('Catagory','like','%'.$searchData . '%')
            ->paginate(2);
            return view('productShow')->with('product',$data);
        }

        public function Restock($id){
           $product = Product::findOrFail($id);
           return view('restock',compact('product'));
        }

        public function storeRequest(Request $request){
            $restock = new requestRestocks();

        $restock->product_id= $request->input('id');
        $restock->product_code= $request->input('product_code');
        $restock->name= $request->input('name');
        $restock->email= $request->input('email');
        $restock->contact= $request->input('contact');

        $restock->save();
        return view('welcome');

        }

        public function showMessage(){
            $messages = requestRestocks::all();
            return view('Restocks',compact('messages'));
        }

        public function checkAvailability(){
           $product = DB::table('products')
           ->join('order_items','products.id','=','order_items.product_id')
           ->select('products.*','order_items.quantity as orderedQuantity')
           ->get();

            return view('Admin.ProductAvailability',compact('product'));
        }
}



