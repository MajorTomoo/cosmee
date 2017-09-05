<style>
.container{padding-top:1rem;}
p{font-size:12px;}
</style>
@extends('layouts.master')
@section('title')
Stock Management
@endsection
@section('content')
<div class='container'>
<div class='row'>
<h3>Stock Management</h3>
</div>
<div class='row'>

<form action='/add-product'>
<button class='btn'>Add Product</button>
</form>

</div>
@component('includes.alert-msg')
@endcomponent
<div class='row'>
@foreach($products as $product)
<div class='card' style='width:7rem;border:0px;margin:2rem;'>
@if(Storage::disk('local')->has('20170831/31_ShuUemura.jpg'))
@endif
 <img style="height:7rem" class="card-img-top" src="{{route('account.img',['filedate'=>date('Ymd',strtotime($product->created_at)),'filename'=>$product->id.'_'.$product->brand.'.'.$product->img_extension ])}}" alt="Card image cap">
  <div class="card-block">
    <h6 class="card-title" style="height:3rem;font-size:11px;text-align:center;border-bottom:1px solid gray;overflow-y:hidden;">{{@$product->name}}</h6>
    <p><a href="{{'/edit-product'.'/'.$product->id}}">Edit</a></p>
    <p><a href="{{ '/delete-product'.'/'.$product->id }}">Delete</a></p>

  </div>

</div>
@endforeach

</div>
</div>
@endsection