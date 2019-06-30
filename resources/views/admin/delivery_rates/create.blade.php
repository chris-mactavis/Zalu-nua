@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">New Delivery Location Rate</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="">Dashboard</a>
      </li>

      <li>
        <a href="">Delivery Location Rate</a>
      </li>

      <li class="active">
        New Delivery Location Rate 
      </li>
    </ol>

    <div class="clearfix"></div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <div class="white-box">
          <div class="row">
            <div class="col-md-8">
              <form action="{{ route('admin.delivery_rates.store') }}" method="post" enctype="multipart/form-data">
                
                {{ csrf_field() }}


                <div class="form-group">
                  <label for="state_id">Select State</label>
                  <select name="state_id" class="form-control input-lg">
                    <option value="">Select State</option>
                    @foreach($states as $state)
                    <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                    @endforeach
                  </select>
                  @if($errors->has('state_id'))
                    <span class="invalid-feedback red">
                      <strong>{{ $errors->first('state_id') }}</strong>
                    </span>
                  @endif
                </div>


                <div class="form-group">
                  <label for="rate">Rate</label>
                  <input type="text" name="rate" class="form-control input-lg {{ $errors->has('rate') ? ' is-invalid' : '' }}" 
                  placeholder="Rate" value="{{ old('rate') }}" /> 
                  @if($errors->has('rate'))
                    <span class="invalid-feedback red">
                      <strong>{{ $errors->first('rate') }}</strong>
                    </span>
                  @endif
                </div>


                <div class="btn_wrap">
                  <button type="submit" class="btn btn-primary btn-lg"> Create </button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div> <!--/.col-md-7-->
    </div> 
  </div>  
</div>


@stop