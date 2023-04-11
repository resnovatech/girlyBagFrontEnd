<div class="header-side-panel" id="footer_cart1">
    <div class="mobilemenu js-push-mbmenu">
        <div class="mobilemenu-content">
            <div class="mobilemenu-close mobilemenu-toggle">Close</div>
            <div class="nav-wrapper show-menu">
                <ul class="nav nav-level-1">
                    <li class="mmenu-item--simple"><a href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="mmenu-item--simple"><a href="{{ route('category') }}">Product</a>
                    </li>
                    <li><a href="{{ route('Calender') }}">Period Calculator</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dropdn-content account-drop" id="dropdnAccount">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>
            <ul>
                @if(Auth::guest())
                <li><a href="{{ route('customer_dashoard_header.login') }}"><span>Log In</span><i class="icon-login"></i></a></li>
                <li><a href="{{ route('customer_dashoard_header.register') }}"><span>Register</span><i class="icon-user2"></i></a></li>
                @else
                <li><a href="{{ route('home') }}"><span>Dashboard</span><i class="icon-user2"></i></a></li>
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><span>Log out</span><i class="icon-card"></i></a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endif
            </ul>
            @if(Auth::guest())
            <div class="dropdn-form-wrapper">
                <h5>Quick Login</h5>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control--sm "
                               placeholder="Enter your e-mail" name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control--sm" placeholder="Enter your password" name="password">
                    </div>
                    <button type="submit" class="btn">Enter</button>
                </form>
            </div>
            @else

            @endif
        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>

    <div class="dropdn-content minicart-drop" id="dropdnMinicart">
        <div class="dropdn-content-block">
            <div class="dropdn-close"><span class="js-dropdn-close">Close</span></div>



            <div class="minicart-drop-content js-dropdn-content-scroll" id="ajaxdatane">






            </div>
            <div class="minicart-drop-fixed js-hide-empty">
                <div class="loader-horizontal-sm js-loader-horizontal-sm" data-loader-horizontal=""><span></span></div>
                <div class="minicart-drop-total js-minicart-drop-total row no-gutters align-items-center">
                    <!--<div class="minicart-drop-total-txt col-auto heading-font">Subtotal</div>
                    <div class="minicart-drop-total-price col" data-header-cart-total="">৳ </div>-->
                </div>

                <div class="minicart-drop-actions">
                    <a href="{{ route('cart.index') }}" class="btn btn--md btn--grey"><i
                                class="icon-basket"></i><span>Cart Page</span></a>
                                @if (Auth::guest())
                                <a href="{{ route('customer_dashoard.login') }}" class="btn btn--md"><i class="icon-checkout"></i><span>Check out</span></a>
                                @else
                    <a href="{{ route('shipping.index') }}" class="btn btn--md"><i class="icon-checkout"></i><span>Check out</span></a>
                    @endif
                </div>
                <ul class="payment-link mb-2">
                    <li><i class="icon-amazon-logo"></i></li>
                    <li><i class="icon-visa-pay-logo"></i></li>
                    <li><i class="icon-skrill-logo"></i></li>
                    <li><i class="icon-klarna-logo"></i></li>
                    <li><i class="icon-paypal-logo"></i></li>
                    <li><i class="icon-apple-pay-logo"></i></li>
                </ul>
            </div>

        </div>
        <div class="drop-overlay js-dropdn-close"></div>
    </div>

</div>
