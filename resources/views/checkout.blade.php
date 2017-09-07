<style>
 .col-md-6 h6{padding-top:2rem;padding-bottom: 1rem;font-size:20px;border-bottom: 1px solid gray;}
.form-control{border-radius: 0 !important;}
.col-md-5 h5{font-size:15px;color:gray;}
 .btn{letter-spacing: .125rem;  border-radius: 0 !important;  background-color: #2e3436;  border: none;  color: #fff;  cursor: pointer;  display: inline-block;  position: relative;  outline: 0;  text-align: center;  text-decoration: none;  text-transform: uppercase;  transition: background-color .15s linear;  vertical-align: middle;  font-family: futura-pt-n7,futura-pt,Tahoma,Geneva,Verdana,Arial,sans-serif;  font-style: normal;  font-weight: 700;  padding: 5.008px 5%;  padding: .313rem 5%;  font-size: 14px;  font-size: .875rem;  padding: 12px 12px;  padding: .75rem 12px;}
.btn:hover{background-color: #7c7c7c;}
    .order-summary{font-size:14px;color:#2e3436;}

</style>
@extends('layouts.master')
@section('title')
    Shipping Address
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-6">
<h6>Shipping Address</h6>@component('includes.error-msg')
    @endcomponent
    @if(!isset($address_exist))
    @else <div class="row"><div class="col-md-8">
        <div class="form-group"><label for="delivery">Delivery To:</label>
        <select class="form-control form-control-sm">
         @foreach($addresses as $address)
         <option value="{{$address->state}}" >{{$address->receiver_name." ".$address->street_address
         ." ".$address->city." ".$address->state." ".$address->postcodes." ".$address->mobile_no}}</option>
         @endforeach
        </select>

        </div>

        </div>
    </div>
@endif
    <div class="row"><div class="col-md-5"><h5>Add New Address</h5>


            <form action="{{route('add-address')}}" method="Post">
                <div class="form-group">
                    <input class="form-control form-control-sm" name="first_name" placeholder="First Name">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-sm" name="last_name" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <input name="address" class="form-control form-control-sm" placeholder="Street Address">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control  form-control-sm" name="city" placeholder="City/Town">
                </div>
                <div class="form-group">
                    <input name="postcodes" class="form-control form-control-sm" placeholder="Postcodes">
                </div>
                <div class="form-group">
                    <select class="form-control form-control-sm" name="state">
                        <option value="Victoria">Victoria</option>
                        <option value="New South Wales">New South Wales</option>
                        <option value="Queensland">Queensland</option>
                        <option value="Western Australia">Western Australia</option>
                        <option value="Tasmania">Tasmania</option>
                        <option value="the Northern Territory">the Northern Territory</option>
                        <option value="South Australia">South Australia</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="country" class="form-control  form-control-sm"><option value="Australia">Australia</option></select>
                </div>
                <div class="form-group">
                    <input name="contact_number" class="form-control form-control-sm" placeholder="Contact Number">
                </div>
                <button class="btn" type="submit">ADD TO ADDRESS BOOK</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

</div>
    <div class="col-md-6">
        <h6>Order Summary</h6>
        <table class="order-summary"><?php if($total_price>=100){$shipping_cost=0;}else{$shipping_cost=8;
            }
            $order_total=$total_price+$shipping_cost;
            ?>
           <p><tr><td>Items Total:</td> <td>${{$total_price}}</td></tr></p>
            <p><tr><td>Shipping:</td><td>${{$shipping_cost}}</td></tr></p>
            <p><tr><td>Order Total:</td><td>${{$order_total}}</td></tr></p>
        </table>
        <p></p>
        <a class="btn btn-success" href="#">pay secure</a>
    </div>
</div>
</div>
@endsection