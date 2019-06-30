<div id="mobile_header">
	
	<div class="top_mobile_header_section">
        <div class="container">
            <div class="nav_trigger">
                <span class="lnr lnr-menu"></span>
            </div>

            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('images/zalu-nua-logo.png') }}" alt=""></a>
            </div>

            <div class="extras">
                
                <div class="cart">
                    <a href="{{ route('cart') }}">
                        <span class="lnr lnr-cart"></span>
                        <span class="count">{{Cart::content()->count()}}</span>
                    </a>
                </div>
            </div>

            <br class="clearfix">
        </div>
    </div>

    <div class="mobile_search_bar"></div>

</div>