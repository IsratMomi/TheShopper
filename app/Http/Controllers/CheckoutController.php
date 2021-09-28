<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use App\Orderitem;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Library\SslCommerz\SslCommerzNotification;
use DB;
//use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Mail;
use App\Mail\placeOrderMailable;
use App\OnlinePay;

class CheckoutController extends Controller
{
    public function index(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('Checkout.index')
         ->with('cart_data',$cart_data);
    }

    public function exampleEasyCheckout(){
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        return view('Checkout.exampleEasycheckout')
         ->with('cart_data',$cart_data);
    }
    private function placeorderMailable($request,$trackin_id){
        $order_data=[
            'name' => $request->input('name'),
            'contact' => $request->input('contact-no'),
            'alternate_contact' =>$request->input('alt_contact'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'cust_email' => $request->input('email'),
            'track_no' => $trackin_id,
        ];
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);

        $to_customer_email = $request->input('email');
        Mail::to($to_customer_email)->send(new placeOrderMailable($order_data,$cart_data));
    }
    public function storeOrder(Request $request){
        if(isset($_POST['place_order_btn'])){
            //user data update
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->contact = $request->input('contact-no');
            $user->alt_contact = $request->input('alt_contact');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->zip_code = $request->input('zip_code');
            $user->save();

            //order placing
            /*
            payment status = 0 (pending),
            1(cash accepted),
            2(cancelled)
            */

           $total_amount = 0;
            $cookie_data = stripslashes(Cookie::get('shopping_cart'));

            $cart_data = json_decode($cookie_data, true);
            $items_in_cart = $cart_data;
            foreach($items_in_cart as $itemdata){
                $total_amount = $total_amount + number_format((float)$itemdata['item_price'],2);
            }
            $track_no = rand(1111,9999);
            $order = new Order();
            $order->name = $user->name;
            $order->email = $user->email;
            $order->phone = $user->contact;
            $order->amount = $total_amount;
            $order->address = $user->address;
            $order->status = 'Pending';
            $order->pay_mode = "Cash on delivery";
            $order->tracking_id = 'shopper'.$track_no;
            $order->save();
            $last_order_id = $order->id;
            $trackin_id = $order->tracking_id;

          //orderd items
            foreach($items_in_cart as $itemdata){

                $order_item = Orderitem::create([
                    'order_id'=> $last_order_id,
                    'product_id' =>$itemdata['item_id'],
                    'price' => $itemdata['item_price'] ,
                    'quantity'=>$itemdata['item_quantity'],
                ]);
                if($order_item){
                    $quantity = Product::where('id', $order_item->product_id)->first()->quantity;
                    //dd($quantity);
                    $total_quantity = $quantity - $order_item->quantity;
                    Product::where('id', $order_item->product_id)->update(['quantity'=> $total_quantity]);
                }

            }
           //$this->updateQuantity();
             $this->placeorderMailable($request,$trackin_id);

            Cookie::queue(Cookie::forget('shopping_cart'));
            return view('thank')->with('status','order has been placed suusccessfully');
        }

    }

    private function updateQuantity(){
        if(isset($_POST['place_order_btn'])){
          $orders = new Orderitem();
          $products = new Product();

          $order_pro_id = $orders->product_id;


            $quantity = ($products->quantity - $orders->quantity);

            $update_quantity = DB::table('products')->where('id', 'like', '%'. $order_pro_id . '%')
            ->update(['quantity' => $quantity ]);
        }


    }

    public function PayViaAjax(Request $request){

        //
        $post_data = array();
        $post_data['total_amount'] = '10'; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid();
        $post_data['track_no']=rand(1111,9999); // tran_id must be unique

        # CUSTOMER INFORMATION
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        $contact = Auth::user()->contact;
        $alt_con = Auth::user()->alt_contact;
        $address=Auth::user()->address;
        $zip = Auth::user()->zip_code;
        $city = Auth::user()->city;

        $post_data['cus_name'] = $name;
        $post_data['cus_email'] = $email;
        $post_data['cus_add1'] = $address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $city;
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = $zip;
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $contact;
        $post_data['alt_cont'] = $alt_con;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";


        #Before  going to initiate the payment order status need to update as Pending.
        // dd(OnlinePay::where('transaction_id', $post_data['tran_id'])->get());
        $update_product = Order::create([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'pay_mode' => 'online pay',
                'tracking_id' => 'shopper'.$post_data['track_no']
            ]);

           /* */

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'checkout', 'json');


        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
            //$this->saveOrderItem();
        }
        $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        $cart_data = json_decode($cookie_data, true);
        $items_in_cart = $cart_data;
        // dd($items_in_cart);
        foreach($items_in_cart as $itemdata){

            $order_item = Orderitem::create([
                'order_id'=> $update_product->id,
                'product_id' =>$itemdata['item_id'],
                'price' => $itemdata['item_price'] ,
                'quantity'=>$itemdata['item_quantity'],
            ]);
            if($order_item){
                $quantity = Product::where('id', $order_item->product_id)->first()->quantity;
                //dd($quantity);
                $total_quantity = $quantity - $order_item->quantity;
                Product::where('id', $order_item->product_id)->update(['quantity'=> $total_quantity]);
            }

        }
        //dd($this->placeorderMailable($request));
        $order_data=[
            'name' => $post_data['cus_name'],
            'contact' => $post_data['cus_phone'],
            'alternate_contact' =>$post_data['alt_cont'],
            'address' => $post_data['cus_add1'],
            'city' => $post_data['cus_city'],
            'zip_code' => $post_data['cus_postcode'],
            'cust_email' => $request->input('email'),
            'track_no' => $update_product->tracking_id,
        ];

        $to_customer_email = $post_data['cus_email'];
        Mail::to($to_customer_email)->send(new placeOrderMailable($order_data,$cart_data));
        Cookie::queue(Cookie::forget('shopping_cart'));

    }



    public function success(Request $request)
    {


            //Cookie::queue(Cookie::forget('shopping_cart'));
          echo "Transaction is Successful";

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('customer_orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */

                $update_product = DB::table('customer_orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);


                echo "<br >Transaction is successfully Completed";

            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('online_pay')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Failed']);
                echo "validation Fail";
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('online_pay')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('online_pay')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }


    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('online_pay')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('online_pay')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('online_pay')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }
}
