<div id="regular_header">	
	<div id="header_top">
		<div class="container">
			<div class="top_notice">
				<div id="fading_text" class="text-center">
                    <div class="text_itm">Shipping Available Worldwide</div>
				</div>
			</div>
		</div>
	</div>

	<div id="header_mid">
		<div class="container">
			<div class="logo_nav">
				<div class="logo">
					<a href="{{ route('home') }}"><img src="{{ asset('images/zalu-nua-logo.png') }}" alt=""></a>
				</div>

				<div class="mid_nav">
					<ul>
						
						@if (Auth::guest())
						
						<li>
							<a href="{{ route('register') }}">Register</a>
						</li>

						<li>
							<a href="{{ route('login') }}">Sign in</a>
						</li>
						
						@else
						
						<li><a href="{{ route('user.account') }}">{{ Auth::user()->name }}</a></li>

						<li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif

                        <li class="">
							<a href="#">
								<span class="lnr lnr-heart"></span>
								
							</a>
						</li>

						<li class="nav_cart">
							<a href="{{ route('cart') }}">
								<span class="lnr lnr-cart"></span>
								<span class="cart_qty_display">{{Cart::content()->count()}}</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="navigation">
		<div class="container">
			<nav>
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
			</nav>
		</div>
	</div>
</div>