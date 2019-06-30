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
            <h4>Nigeria</h4>
            <h5>States</h5>
            <div class="zone-box">
                @foreach($states as $state)
                <div class="zone">
                    <input type="checkbox" name="zone{{ ++$inc }}" id="zone{{ $inc }}">
                    <label for="zone{{ $inc }}">{{ $state->state_name }}</label>
                </div>
                @endforeach
            </div>

            <button class="btn btn-sm btn-primary">&rarr;</button>
            <div class="ship-to">
                    <span>Please select states to ship to <br> Please select states to <br>  ship to <br> Please select states to <br>  ship to <br> Please select states to <br>  ship to <br> Please select states to <br>  ship to <br> Please select states to <br>  ship to <br> Please select states to <br>  ship to </span>
                {{-- <div class="ship-to-container"> --}}
                    {{-- <button class="btn btn-sm btn-primary">&rarr;</button> --}}

                {{-- </div> --}}
            </div>
            
            <div class="zone-box">
                
            </div>
            <button id="selectAll" class="btn btn-primary">Select All</button>
        </div>
    </div>
</div>

@stop