<div class="sidebar_itm well">
    <div class="sidebar_itm_content">
        <ul>
            <li>
            	<a href="{{ route('user.account') }}">
            		<i class="fa fa-user"></i> Profile
            	</a>
            </li>

            <li>
            	<a href="{{ route('user.orders') }}">
            		<i class="fa fa-shopping-cart"></i> Orders
            	</a>
            </li>

            <li>
            	<a href="#">
            		<i class="fa fa-heart"></i> Wishlist
            	</a>
            </li>

            <li>
            	<a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
            		<i class="fa fa-lock"></i> Logout
            	</a>
            	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

        </ul>
    </div>
</div>