@extends('layouts.actlayout')
@section('title')
Sign In
@endsection
@section('content')

<div class='container'>
<div class='row'><div class='col-md-3'></div>
<div class='col-md-6' id='register-container'>
<div class="page-header"><h4>Sign in with email</h4></div>
@component('includes.error-msg')
@endcomponent
@component('includes.alert-msg')
@endcomponent
<div class=row>
<div class='col-md-8'>
<form action="{{ route('signin') }}" method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <a href="password/reset"> forgot password?</a>
  </div>
  <button type="submit" class="btn btn-primary">SIGN IN</button>
  <input type="hidden" name="_token" value="{{ Session::token() }}">
</form></div><div class='col-md-4'></div>
</div>
</div>
<div class='col-md-3'></div></div>
</div>


@endsection
