<div id="side_navigation" class="sidenav">
    <a href="javascript:void(0)" class="closebtn">&times;</a>

    <div class="sidenav_ins">
        <ul>
        	<li>
				<a href="{{ route('products.sale') }}" class="sale">Sale</a>
			</li>
			
			@foreach($stores as $store)
			<li>
				<a href="{{ route('products.department', ['department_url'=> $store->department_url]) }}">
					{{ $store->department_name }}
				</a>
			</li>
			@endforeach

			<li>
				<a href="{{ route('contact') }}">Contact us</a>
			</li>

        </ul>
    </div>
</div>