<?php
/**
 * Created by PhpStorm.
 * User: Ian
 * Date: 2017/9/8
 * Time: 4:22
 */

namespace Laravel\Http\Controllers;
use Laravel\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function postAddAddress(Request $request){
$this->validate($request,[
    'first_name'=>'required',
    'last_name'=>'required',
    'state'=>'required',
    'city'=>'required',
    'address'=>'required',
    'postcodes'=>'required',
    'contact_number'=>'required'
]);

$address=new Address();
$address->receiver_name=strtoupper($request['first_name']." ".$request['last_name']);
$address->street_address=strtoupper($request['address']);
$address->state=strtoupper($request['state']);
$address->city=strtoupper($request['city']);
$address->mobile_no=$request['contact_number'];
$address->user_id=Auth::id();
$address->postcodes=$request['postcodes'];
$address->save();

return redirect()->route('checkout');
    }

}