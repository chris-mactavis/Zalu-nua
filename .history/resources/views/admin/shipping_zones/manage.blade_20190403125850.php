@extends('layouts.adminlayout')


@section('content')

<div class="page-title-box">
    <h4 class="page-title">Manage Shipping Zones</h4>
      
    <ol class="breadcrumb">
      <li>
        <a href="/admin">Dashboard</a>
      </li>

      <li class="active">
        Manage Shipping Zones
      </li>
    </ol>

    <div class="clearfix"></div>

</div>
<div class="white-box">

    <div class="row">
        <div class="col-md-12">
            <h3>Nigeria</h3>
            <div class="zone-box">
                @foreach($states as $state)
                <div class="zone">
                    <input type="checkbox" name="zone{{ ++$inc }}" id="zone{{ $inc }}">
                    {{ $state->state_name }}
                </div>
                @endforeach
            </div>
            <button class="btn btn-primary">Select all</button>
        </div>
    </div>
</div>

@stop