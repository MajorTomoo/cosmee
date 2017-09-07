<style>
    body, button, select, input, textarea {
        font-family: Oxygen,Helvetica,Arial,tahoma,Microsoft YaHei,Hiragino Sans GB,sans-serif !important;
        border-radius:0 !important;
    }

h5{padding-top:1rem;}
div h7{color:gray;font-size:14px;}
.price{font-size:22px;font-weight:700;}
    #discount{color:#ff3d36}
 #description{padding-top:2rem;margin-bottom:2rem;font-size:20px;}
    #description-content{font-size:12px;}
</style>
@extends('layouts.master')
@section('title')
    Product Detail
@endsection
@section('content')
    <div class="container"><div class="row"> <h5>{{$product->name}}</h5></div>
<div class="row" style="padding-top:2rem;">
<div class="card col-md-4"><img class="card-img-top img-responsive" src="{{route('account.img',['filedate'=>date('Ymd',strtotime($product->created_at)),'filename'=>$product->id.'_'.$product->brand.'.'.$product->img_extension ])}}"></div>
<div class="col-md-8" style="padding-left:2rem;"><h7>Cosmee Price</h7>
<div class="price">AU ${{$product->current_price}}</div>
    <p><h7> AU ${{$product->orginal_price}}</h7><h7 id="discount">  {{ intval((($product->orginal_price-$product->current_price)/$product->current_price)*100)}}%OFF</h7></p>
<div><h7>Quantity:</h7></div><form action="{{route('addtocart')}}" method="POST">
  <div class="row"><div class="col-md-3"><p><input name="quantity" class="form-control" type="number" min="1" max="50"></p></div> </div>
    <button type="submit" class="btn btn-success">Add To Cart</button>
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
</div>
</div>
        <div class="row">
            <h4 id="description">Description</h4>
            <div class="col-md-12" id="description-content">{!!nl2br(e($product->description)) !!}</div></div>



    </div>
@endsection