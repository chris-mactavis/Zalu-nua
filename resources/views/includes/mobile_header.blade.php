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

<div class="mobile_nav_menu" id="mobile_nav_menu">
    <ul>
        <li><a href="/sale">SALE</a></li>
        <li><a href="/store/the-collection">THE COLLECTION</a></li>
        <li><a href="/store/zalu-nua-silver">ZALU-NUA SILVER</a></li>
        <li><a href="/store/z-n-boutique">Z-N BOUTIQUE</a></li>
        <li><a href="/store/whats-new">WHAT'S NEW</a></li>
        <li><a href="/store/mens-shop">MENS SHOP</a></li>
        <li><a href="/store/accessories">ACCESSORIES</a></li>
        <li><a href="/contact">CONTACT US</a></li>
    </ul>
</div>