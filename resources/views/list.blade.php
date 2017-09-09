<style>
.cate-container{padding-top:1rem;padding-left:7rem;}

</style>
@extends('layouts.master')
@section('title')
    List
@endsection
@section('content')
<div class="container-fluid">

@foreach($category as $cate)
        <div class="row cate-container"> <h6>{{$cate}}:</h6>  </div>
@endforeach

    <div class='row' style="margin:0 1.5rem;margin-bottom:0.5rem;padding:1rem 2rem 1rem 2rem;">
        @foreach($products as $product)

            <div  class='card col-md-2 col-sm-4 col-xs-12' style='border:0;padding-left:2rem;padding-right: 2rem;'>

                <a href="{{'/product'.'/'.$product->name.'/'.$product->id}}" style="color:black;height:100%;"><img  style="height:100%;" class="card-img-top "  src="{{route('account.img',['filedate'=>date('Ymd',strtotime($product->created_at)),'filename'=>$product->id.'_'.$product->brand.'.'.$product->img_extension ])}}" alt="Card image cap"></a>
                <div class="card-block">
                    <a href="{{'/product'.'/'.$product->name.'/'.$product->id}}" style="color:black;"><h6 style="height: 3rem;font-size: 11px;text-align: center;border-bottom: 1px solid gray;overflow-y: hidden;" class="card-title">{{@$product->name}}</h6></a>
                    <a href="{{'/product'.'/'.$product->name.'/'.$product->id}}" style="color:black;font-size:12px;"><p>AU ${{$product->current_price}}</p></a>
                </div>
            </div>
        @endforeach
    </div></div>
@endsection