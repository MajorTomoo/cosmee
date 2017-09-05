<style>
body{font-family: Oxygen,Helvetica,Arial,tahoma,Microsoft YaHei,Hiragino Sans GB,sans-serif;}
#category-list{border:4px solid #896E42;padding:1rem 0rem;background:white;}
#category-list li{border:0px;padding-top:1rem;padding-bottom:1rem;}
#category-list li a{text-decoration: none;display: block;color: #333;-webkit-transition: .3s;transition: .3s;border-width: 1px 0;text-align:center;	font-size:14px;}
#img-holder{background-origin: content-box;background-repeat: no-repeat;background-size:1100px;padding-right:0px; background-image: url('http://15859-presscdn-0-51.pagely.netdna-cdn.com/wp-content/uploads/2017/03/OMG_WACO_Tatti_Blog-30.jpg');}
h5{text-align:center;color:#212121;}
.ad-list{background-color:#666;display:inline-block;}
.col-md-4 a{padding-top:4px;padding-bottom:7px;text-align:center;font-size:14px;display:block;color:white !important;}
.brand-container{font-size:13px;text-align:center;display:block;font-weight:600;color:black;height:19.5px;overflow-x:hidden;}
#brand-container .col-md-2 {margin-top:1rem;padding:0rem 1rem 1rem 1rem;}
a:hover{text-decoration: none !important;}
</style>
@extends('layouts.master')
@section('title')
Welcome!
@endsection
@section('content')
<div class='container-fluid'>
<div class='row' id='ad-listcontainer' style="margin:0rem 1.5rem;margin-bottom:0.5rem;">
<div class='col-md-4' style="background-color: #51b7ef"><a>FREE Gift & Special Offers</a></div>
<div class='col-md-4' style="background-color: #FEB5D0"><a>Japanese Beauty + Flash Deals Up To 60%</a></div>
<div class='col-md-4' style="background-color: #E8DDD9"><a>Free Standard Shipping with any AU$ 100 purchase</a></div>
</div>
<div class='row' style="margin:0rem 1.5rem;">
<div class='col-md-2' style="padding-right:0px;padding-left:0px;">
 <ul class="list-group" id="category-list">
  <li class="list-group-item"><h5>NEW ARRIVALS</h5></li>
  <li class="list-group-item"><a>Body Care</a></li>
  <li class="list-group-item"><a>Face Care</a></li>
  <li class="list-group-item"><a>Sun Care</a></li>
  <li class="list-group-item"><a>Hand & Nail Care</a></li>
  <li class="list-group-item"><a>Hair & Scalp Care</a></li>
  <li class="list-group-item"><a>Makeup & Cosmetics</a></li>
</ul> 
</div>
<div class='col-md-10' id="img-holder">
</div>
</div>
<div class='row' style="background:#E8DDD9;height:1.5rem;margin-top:1rem;"></div>
<div class='row' style="margin:0rem 1.5rem;margin-bottom:0.5rem;padding-top:1rem;">
<h5 style="color:#444;">Popular Brands</h5></div>
<div class='row' style="margin:0rem 1.5rem;margin-bottom:0.5rem;padding:auto;" id="brand-container">
@foreach($products as $product)
<div class='col-md-2 col-sm-12 col-xs=12'><ul class='list-group'><li class='list-group-item'><a title="{{$product->brand}}" href="#" class='brand-container'>{{$product->brand}}</a></li></ul></div>
@endforeach
</div>
<div class='row' style="background:#E8DDD9;height:1.5rem;margin-top:1rem;"></div>

<div class='row' style="margin:0rem 1.5rem;margin-bottom:0.5rem;padding-top:1rem;">
<h5 style="color:#444;">New Arrival</h5></div>
<div class='row' style="margin:0rem 1.5rem;margin-bottom:0.5rem;padding:1rem 2rem 1rem 2rem;">
@foreach($products as $product)
<div class='card col-md-2 col-sm-4 col-xs-12' style='border:0px;'>
@if(Storage::disk('local')->has('20170831/31_ShuUemura.jpg'))
@endif
 <img style="height:100%;" class="card-img-top" src="{{route('account.img',['filedate'=>date('Ymd',strtotime($product->created_at)),'filename'=>$product->id.'_'.$product->brand.'.'.$product->img_extension ])}}" alt="Card image cap">
  <div class="card-block">
    <h6 class="card-title" style="height:3rem;font-size:11px;text-align:center;border-bottom:1px solid gray;overflow-y:hidden;">{{@$product->name}}</h6>
    <p><a href="{{'/edit-product'.'/'.$product->id}}">Edit</a></p>
    <p><a href="{{ '/delete-product'.'/'.$product->id }}">Delete</a></p>

  </div>

</div>

@endforeach

</div>
</div>
  
<div class='container'>


</div>
@endsection