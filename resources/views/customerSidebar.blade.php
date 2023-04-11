<a href="{{ route('home') }}" class="list-group-item {{ Route::is('home') ? 'active' : ''}}">Account Details</a>
<a href="{{ route('customer_addresss') }}" class="list-group-item {{ (request()->is('customer_addresss'))? 'active' : ''}}">My Addresses</a>
<!--<a href="account-wishlist.php" class="list-group-item ">My Wishlist</a>-->
<a href="{{ route('customer_history') }}" class="list-group-item {{ Route::is('customer_history') ? 'active' : ''}}">My Order History</a>

<a href="{{ route('period_information') }}" class="list-group-item {{ Route::is('period_information') ? 'active' : ''}}">Period Information</a>
