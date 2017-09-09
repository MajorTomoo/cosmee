@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row" style="padding-top:3rem;">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5 style="margin-left:1rem;padding-bottom:1rem;border-bottom:1px solid gray;!important;">Reset Password</h5></div>

                    <div class="panel-body" style="padding-top:2rem;">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input style="font-size:12px;" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary responsive-width" style="margin-top: 2rem;" >
                                        Send Email
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
