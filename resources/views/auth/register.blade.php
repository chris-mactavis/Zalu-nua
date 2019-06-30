<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.seclayout')

@section('content')
<div class="login_wrap pt30 pd50">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="padding: 10px 20px"><h3>Register</h3></div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Full Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone Number</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            @php
                            $countries = App\Country::orderBy('country_name')->get();
                            @endphp
                            
                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                <label for="reg-country" class="col-md-4 control-label">Country</label>

                                <div class="col-md-6">
                                    <select name="country" id="reg-country" class="form-control" value="{{ old('country') }}" required>
                                        <option value="">Select a country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->country_name}}" {{$country->country_name == 'Nigeria' ? 'selected' : ''}}>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                <label for="reg-state" class="col-md-4 control-label">State</label>
                                <?php
                                $states = DB::table('states')->get();
                                ?>
                                <div class="col-md-6" id="state-container">
                                    <select name="state_id" class="form-control" id="reg-state">
                                        @foreach($states as $state)
                                        
                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                        
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" name="state_id_alt" class="form-control" id="reg-state-alt" placeholder="State"> --}}
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="reg-city" class="col-md-4 control-label">City</label>

                                <div class="col-md-6" id="city-container">
                                    <select class="form-control" name="city" id="reg-city"></select>

                                    {{-- <input type="text" name="city_alt" class="form-control" placeholder="City" id="reg-city-alt"> --}}

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address" class="col-md-4 control-label">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="login_extra text-center">
                            <p class="text-center">Already registered?</p> 
                            <a href="{{route('login')}}" class="btn btn-danger btn-lg"> Login </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
