<div class="footer-sticky">
    <div class="popup-addedtocart js-popupAddToCart closed" data-close="2000">
        <div class="container">
            <div class="row">
                <div class="popup-addedtocart-close js-popupAddToCart-close"><i class="icon-close"></i></div>
                <div class="popup-addedtocart-cart js-open-drop" data-panel="#dropdnMinicart"><i
                        class="icon-basket"></i></div>
                <div class="col-auto popup-addedtocart_logo">
                    <img
                        src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                        data-src="{{ asset('/') }}public/front/images/logo/logo.png" class="lazyload fade-up" alt="">
                </div>
                <div class="col popup-addedtocart_info">
                    <div class="row">
                        <a href="product.php" class="col-auto popup-addedtocart_image">
                        <span class="image-container w-100">
                            <img
                                src="{{ asset('/') }}public/front/images/images/skins/fashion/products/product-01-1.png"
                                alt=""/>
                        </span>
                        </a>
                        <div class="col popup-addedtocart_text">
                            <a href="product.php" class="popup-addedtocart_title"></a>
                            <span class="popup-addedtocart_message">Added to Cart</span>
                        </div>
                    </div>
                </div>
                <div class="col-auto popup-addedtocart_actions">
                    <span>You can continue</span>

                    <!--<a href="#" class="btn btn--grey btn--sm js-open-drop"
                                                     data-panel="#dropdnMinicart"><i class="icon-basket"></i><span>Check Cart</span></a>



                    <span>or</span> -->


                    @if (Auth::guest())

                        <a href="{{ route('customer_dashoard.login') }}" class="btn btn--invert btn--sm"><i
                                class="icon-envelope-1"></i><span>Check out</span></a>
                    @else



                        <a href="{{ route('shipping.index') }}" class="btn btn--invert btn--sm"><i
                                class="icon-envelope-1"></i><span>Check out</span></a>
                    @endif


                </div>
            </div>
        </div>
    </div>

    <div class="loader-horizontal js-loader-horizontal">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
        </div>
    </div>
</div>
<footer class="page-footer footer-style-6 ">
    <div class="holder ">
        <div class="footer-shop-info">
            <div class="container">
                <div class="text-icn-blocks-bg-row">
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-trolley"></i>
                        </div>
                        <div class="text">
                            <h4>Home Delivery</h4>
                            <p> We will deliver your order to your doorstep at your convenience. </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-currency"></i>
                        </div>
                        <div class="text">
                            <h4>Best price</h4>
                            <p>We’ll find you the best price for your choice. </p>
                        </div>
                    </div>
                    <div class="text-icn-block-footer">
                        <div class="icn">
                            <i class="icon-diplom"></i>
                        </div>
                        <div class="text">
                            <h4>Tracker</h4>
                            <p>Keep track of your cycles with our intelligent trackers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-top">
        <div class="container">
            <div class="row mt-0">
                <div class="col-lg col-xl last-mobile">
                    <div class="footer-block">
                        <div class="footer-logo">
                            <a href="index.php"><img class="lazyload fade-up"
                                                     src="data:{{asset('/')}}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                                     data-srcset="{{asset('/')}}public/front/images/logo/logo.png, {{asset('/')}}public/front/images/logo/logo.png"
                                                     alt="Logo"></a>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li>E-mail: <a href="mailto:Foxshop@gmail.com">thegirlybag@gmail.com</a></li>
                                <li>Hours: 10:00 - 18:00, Mon - Fri</li>
                            </ul>
                        </div>
                        <ul class="social-list">
                            <li>
                                <a href=https://www.facebook.com/girlybag.bd/#" target="_blank"><i class="icon-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/bag_girly?s=08" target="_blank"><i class="icon-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://instagram.com/thegirlybag?utm_medium=copy_link" target="_blank"><i class="icon-instagram"></i></a>
                            </li>
                            <li>
                                <a href=https://www.linkedin.com/company/the-girly-bag#" target="_blank"><i class="icon-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Information</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                {{--                                <li><a href="typography.php">Terms & Conditions</a></li>--}}
                                {{--                                <li><a href="typography.php">Returns & Exchanges</a></li>--}}
                                {{--                                <li><a href="typography.php">Shipping & Delivery</a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Account details</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul>
                                @if(Auth::guest())

                                    <li><a href="{{ route('customer_dashoard_header.login') }}">My Account</a></li>

                                @else

                                    <li><a href="{{ route('home') }}">My Account</a></li>
                                @endif

                                <li><a href="{{ route('cart.index') }}">View Cart</a></li>
                                <!--<li><a href="account-wishlist.php">My Wishlist</a></li>
                                <li><a href="account-history.php">Order Status</a></li>
                                <li><a href="account-history.php">Track My Order</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-xl">
                    <div class="footer-block collapsed-mobile">
                        <div class="title">
                            <h4>Safe payments</h4>
                            <span class="toggle-arrow"><span></span><span></span></span>
                        </div>
                        <div class="collapsed-content">
                            <ul class="payment-link">
                                <li><i class="icon-visa-pay-logo"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-bottom--bg">
        <div class="container">
            <div class="footer-copyright text-center">
                <a href="#">TheGirlyBag</a> ©2021 copyright
            </div>
        </div>
    </div>
</footer>
