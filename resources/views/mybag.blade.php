<style>
div h5{padding-top:2rem;padding-bottom:1rem;border-bottom:1px solid gray;}
#product-container{padding:1rem;font-size:12px;}
    .price{color:#9A0000;}
</style>

@extends('layouts.master')
@section('title')
    My Bag
@endsection
@section('content')
<div class="container">
    <h5>Shopping Bag</h5>
    <?php $total_price=0;?>
    @if(isset($products))
@foreach( $products as $product)
        <div class="row" id="product-container"><div class="card col-md-1">

                <img class="card-img-top img-responsive" src="{{route('account.img',['filedate'=>date('Ymd',strtotime($product->created_at)),'filename'=>$product->id.'_'.$product->brand.'.'.$product->img_extension ])}}">
            </div><div class="col-md-11">
            <h6>{{$product->name}}</h6>
                <p><i class="price">${{$product->current_price}}</i> × {{$product->quantity}}</p>
                <a href="{{'/remove-product/'.$product->id.'/'.$product->order_id}}">Remove</a>
                <?php
                    $price=$product->current_price*$product->quantity;
                $total_price=$price+$total_price;
                ?>
            </div></div>
@endforeach
    @endif
    <div class="row">
     <div class="col-md-12">
         <h5>Items in Total: <i class="price">${{$total_price}}</i></h5>
     <a class="btn btn-success" href="/checkout">Check Out</a>
     </div>

    </div>
</div>


@endsection