<style>
<!--

-->
.container{padding-top:1rem;}
h4{border-bottom:1px solid gray;}
#formcontrol{padding-top:2rem;}
</style>
@extends('layouts.master')
@section('titlte')
Edit Product
@endsection
@section('content')
<div class='container'>
<div class='row'>

<div class='col-md-5'>
<h4>Edit Product</h4>
@component('includes.error-msg')
@endcomponent
@component('includes.alert-msg')
@endcomponent
<form action="{{ route('editproduct') }}" method="post" id='formcontrol' enctype="multipart/form-data">
  <div class="form-group"> 
    <label for="name">Product Name</label>
    <input name="name" value="{{$product->name}}" class="form-control"   placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="brand">Brand</label>
    <input name="brand" value="{{$product->brand}}"  class="form-control"   placeholder="Enter brand">
  </div>
  <div class="form-group">
    <label for="current_price">Current Price</label>
    <input name="current_price" value="{{$product->current_price}}"  class="form-control" placeholder="Current price">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="orginal_price">Orginal Price</label>
    <input name="orginal_price" value="{{$product->orginal_price}}" class="form-control"  placeholder="Original price">
  </div>
  <div class="form-group">
    <label for="size">Size</label>
    <input name="size"  value="{{$product->size}}" class="form-control"  placeholder="Enter size">
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select name='category' id='catej'>
    <option value="Clthothing & Shoes">Clothing &amp; Shoes</option>
    <option value="Makeup & Cosmetics">Makeup &amp; Cosmetics</option>
    <option value="Skincare">Skincare</option>
    <option value="Healthy & Snacks">Healthy &amp; Snacks</option>
    <option value="Accessories">Accessories</option>
    <option value="Home & Lifestyle">Home &amp; Lifestyle</option>
    </select>
  </div>
  <div class="form-group">
    <label for="type">Type</label>
    <input name="type"  class="form-control" value="{{$product->type}}"  placeholder="Enter product type">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input name="stock"  value="{{$product->stock}}" class="form-control"  placeholder="Enter stock">
  </div>

  <div class="form-group">
    <label for="image">Product image</label>
    <input name="image" type="file" class="form-control"  placeholder="upload image">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea name='description' class="form-control" rows="6">{{$product->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <input type="hidden" name="_token" value="{{ Session::token() }}">
  <input name="id" type="hidden" value="{{ $product->id }}">
  <input id="hidden-cate" type="hidden" value="{{$product->category}}">
</form></div><div class='col-md-4'></div>
</div>
</div>

<script>
$( document ).ready(function() {
$('#catej option').each(function(){
if($(this).val()==$('#hidden-cate').val()){
$(this).prop('selected',true);
}
});
});
</script>



@endsection