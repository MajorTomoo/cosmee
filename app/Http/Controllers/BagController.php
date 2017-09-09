<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2017/9/7
 * Time: 17:44
 */

namespace Laravel\Http\Controllers;

use Laravel\Tools\Helper;
use Laravel\Address;

use Laravel\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Product;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
class BagController extends Controller
{
public function getBagPage(){
if(!Auth::check()){
    return redirect()->route('signin');
}
    $user_id=Auth::id();
    $order=Order::where([['user_id',$user_id],['payment',0]])->first();
    if($order){
        $order_id=$order->id;


    $products=\DB::table('order_user')->join('products','order_user.product_id','=','products.id')
        ->where([['order_id',$order_id],['user_id',$user_id]])->get();



    return view('mybag',['products'=>$products]);
    }
    return view('mybag');
}
    public function remove($product_id,$order_id){
        if(!Auth::check()){
            return redirect()->route('signin');
        }
     $product=\DB::table('order_user')->where([['product_id',$product_id],['order_id',$order_id]]);
     $product->delete();
     return redirect()->route('mybag');
    }
    public function addToCart(Request $request){
        if(!Auth::check()){
            return redirect()->route('signin');
        }
        $id=$request['id'];
        $quantity=$request['quantity'];
        $user_id=Auth::id();
        $quantity=$request['quantity'];
        $result=Order::where('user_id','=',$user_id)->first();
//check whether order exist
        if(!$result){

            $order=new Order();
            $order->user_id=$user_id;
            $order->save();

        }
        else{

            $order=Order::where('user_id',$user_id)->orderBy('created_at','desc')->first();
            if($order->payment==1){
                $order=new Order();
                $order->user_id=$user_id;
                $order->save();
                $order=Order::where('user_id',$user_id)->where('payment','=',0)->first();

                //return response($order,'200');
            }

        }
        $product_exit= \DB::table('order_user')->where([['product_id',$id],['order_id',$order->id]])->first();
        if(!$product_exit){

            \DB::table('order_user')->insert(['product_id'=>$id, 'user_id'=>$user_id, 'order_id'=>$order->id
                , 'quantity'=>$quantity]);

        }
        else{
            $old_quantity=\DB::table('order_user')->where([['product_id',$id],['order_id',$order->id]])->first()->quantity;

            \DB::table('order_user')->where([['product_id',$id],['order_id',$order->id]])->update(['quantity'=>$quantity+$old_quantity]);
        }

        return redirect()->route('mybag');
    }

    public function getCheckOut(){
        if(!Auth::check()){
            return redirect()->route('signin');
        }
        $user_id=Auth::id();
        $order_id=Order::where([['user_id',$user_id], ['payment',0]])->first()->id;
        $product_exist=\DB::table('order_user')->join('products','order_user.product_id','=','products.id')
            ->where([['order_id',$order_id],['user_id',$user_id]])->first();
        if(!isset($product_exist)){
            return response('You do not have any products in your bag',200);
        }
        $products=\DB::table('order_user')->join('products','order_user.product_id','=','products.id')
            ->where([['order_id',$order_id],['user_id',$user_id]])->get();

        $total_price=0;
        foreach($products as $product){
            $total_price=$total_price+$product->current_price*$product->quantity;
        }

        $address_exist=Address::where('user_id','=',$user_id)->first();
        $addresses=Address::where('user_id','=',$user_id)->get();



        return view('checkout',['total_price'=>$total_price,'address_exist'=>$address_exist,'addresses'=>$addresses]);
    }
    public function postCheckOut(Request $request){
        if(!Auth::check()){
            return redirect()->route('signin');
        }
        //calculate total price
        $user_id=Auth::id();
        $order_id=Order::where([['user_id',$user_id], ['payment',0]])->first()->id;
        $products=\DB::table('order_user')->join('products','order_user.product_id','=','products.id')
            ->where([['order_id',$order_id],['user_id',$user_id]])->get();

        $total_price=0;
        foreach($products as $product){
            $total_price=$total_price+$product->current_price*$product->quantity;
        }
        //stripe handle
        Stripe::setApiKey('sk_live_Un2n15nR043t7GZFoHJWqTUs');
        $token  = $request['stripeToken'];
        $user_email=Auth::user()->email;
        $customer = Customer::create(array(
            'email' => $user_email,
            'source'  => $token
        ));
        $charge = Charge::create(array(
            'customer' => $customer->id,
            'amount'   => round($total_price*100),
            'currency' => 'aud'
        ));

        return response( '<h1>Successfully charged !</h1>',200);

    }

}
