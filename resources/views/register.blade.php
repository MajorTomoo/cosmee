@extends('layouts.actlayout')
@section('title')
Sign Up
@endsection
@section('content')
<div class='container'>
<div class='row'><div class='col-md-3'></div>
<div class='col-md-6' id='register-container'>
<div class="page-header"><h4>Sign up using your email address</h4></div>
@component('includes.error-msg')
@endcomponent
<div class='row'>
<div class='col-md-8'>
<form action="{{ route('signup') }}" method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input name="email" value="{{Request::old('email')}}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="email">Name</label>
    <input name="name" value="{{Request::old('name')}}" type="name" class="form-control" placeholder="Enter name">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Verify Your Password</label>
    <input name="verifypassword" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">JOIN COSMEE</button>
  <input type="hidden" name="_token" value="{{ Session::token() }}">
</form></div><div class='col-md-4'></div>
</div>
</div>
<div class='col-md-3'></div></div>
</div>


@endsection
