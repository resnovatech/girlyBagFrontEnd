<header class="hdr-wrap">
    <div class="hdr-content hdr-content-sticky">
        <div class="container">
            <div class="row">
                <div class="col-auto show-mobile">
                    <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a></div>
                </div>
                <div class="col-auto hdr-logo">
                    <a href="{{ route('index') }}" class="logo"><img
                            srcset="{{ asset('/') }}public/front/images/logo/logo.png 1x, {{ asset('/') }}public/front/images/logo/logo.png " alt="Logo"></a>
                </div>
                <div class="hdr-nav hide-mobile nav-holder-s">
                </div>
                <div class="hdr-links-wrap col-auto ml-auto">
                    <div class="hdr-inline-link">
                        <div class="search_container_desktop">
                            <div class="dropdn dropdn_search dropdn_fullwidth">
                                <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i
                                        class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                                <div class="dropdn-content">
                                    <div class="container">

                                        <input name="search" type="text" id='employee_searchone1' class="search-input input-empty typeahead"
                                               placeholder="What are you looking forr?">

                                        <button type="submit" class="search-button"><i class="icon-search"></i>
                                        </button>
                                        <a href="#" class="search-close js-dropdn-close"><i
                                                class="icon-close-thin"></i></a>
                                </div>
                                <table class="">

<tbody id="dest1">

</tbody>

                                </table>
                                </div>
                            </div>
                        </div>
{{--                        <div class="dropdn dropdn_wishlist">--}}
{{--                            <a href="account-wishlist.php" class="dropdn-link only-icon wishlist-link ">--}}
{{--                                <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span--}}
{{--                                    class="wishlist-qty">3</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="dropdn dropdn_account dropdn_fullheight">

                            @if(Auth::guest())
                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                            data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                            @else

                            <a href="#" class="dropdn-link js-dropdn-link js-dropdn-link only-icon"
                            data-panel="#dropdnAccount"><i class="icon-user"></i><span class="dropdn-link-txt">{{ Auth::user()->name }}</span></a>
                               @endif
                        </div>
                        <div class="dropdn dropdn_fullheight minicart">
                            <a href="#" class="dropdn-link js-dropdn-link minicart-link only-icon"
                               data-panel="#dropdnMinicart"  id="sidebarCardId">
                                <i class="icon-basket"></i>
                                <span class="minicart-qty"><span class="basket-item-count">
                                    <span class="badge badge-pill red"> 0 </span>
                                </span></span>
                                <!--<span class="minicart-total hide-mobile">${{ \Cart::getTotal() }}</span>-->
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hdr">
        <div class="hdr-topline hdr-topline--dark js-hdr-top">
            <div class="container">
                <div class="row flex-nowrap">
                    <div class="col hdr-topline-left hide-mobile">
                        <div class="hdr-line-separate">
                            <ul class="social-list list-unstyled">
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
                    <div class="col hdr-topline-center">
                        <div class="custom-text js-custom-text-carousel"
                             data-slick='{"speed": 1000, "autoplaySpeed": 3000}'>
                            <div class="custom-text-item"><i class="icon-fox"></i> Use promocode <span>GIRLYBAG</span> to
                                get 15% discount!
                            </div>
                            <div class="custom-text-item"><i class="icon-air-freight"></i> <span>Free</span>
                                shipping For <span>First 10 Ordes</span></div>
                            <div class="custom-text-item"><i class="icon-gift"></i> Today only! Post
                                <span>holiday</span> Flash Sale! 2 for 20 Taka
                            </div>
                        </div>
                    </div>
                    <div class="col hdr-topline-right hide-mobile">
                        <div class="hdr-inline-link">
                            <div class="hdr_container_desktop">
                                <div class="dropdn dropdn_account dropdn_fullheight">


                                    @if(Auth::guest())
                                    <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i
                                        class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>
                                    @else

                                    <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i
                                        class="icon-user"></i><span class="dropdn-link-txt">{{ Auth::user()->name}}</span></a>

@endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hdr-content">
            <div class="container">
                <div class="row">
                    <div class="col-auto show-mobile">
                        <div class="menu-toggle"><a href="#" class="mobilemenu-toggle"><i class="icon-menu"></i></a>
                        </div>
                    </div>
                    <div class="col-auto hdr-logo">
                        <a href="{{ route('index') }}" class="logo"><img
                                srcset="{{ asset('/') }}public/front/images/logo/logo.png 1x, {{ asset('/') }}public/front/images/logo/logo.png "
                                alt="Logo"></a>
                    </div>
                    <div class="hdr-nav hide-mobile nav-holder justify-content-center px-4">
                        <ul class="mmenu mmenu-js">
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
                    <div class="hdr-links-wrap col-auto ml-auto">
                        <div class="hdr-inline-link">
                            <div class="search_container_desktop">
                                <div class="dropdn dropdn_search dropdn_fullwidth">
                                    <a href="#" class="dropdn-link  js-dropdn-link only-icon"><i
                                            class="icon-search"></i><span class="dropdn-link-txt">Search</span></a>
                                    <div class="dropdn-content">
                                        <div class="container">

                                                <input name="search" type="text" id='employee_searchone' class="search-input input-empty typeahead"
                                                       placeholder="What are you looking forr?">

                                                <button type="submit" class="search-button"><i class="icon-search"></i>
                                                </button>
                                                <a href="#" class="search-close js-dropdn-close"><i
                                                        class="icon-close-thin"></i></a>
                                        </div>
                                        <table class="">

<tbody id="dest">

</tbody>

                                        </table>

                                    </div>
                                </div>
                            </div>
{{--                            <div class="dropdn dropdn_wishlist">--}}
{{--                                <a href="account-wishlist.php" class="dropdn-link only-icon wishlist-link ">--}}
{{--                                    <i class="icon-heart"></i><span class="dropdn-link-txt">Wishlist</span><span--}}
{{--                                        class="wishlist-qty">3</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            <div class="hdr_container_mobile show-mobile">
                                <div class="dropdn dropdn_account dropdn_fullheight">

                                    @if(Auth::guest())



                                    <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i
                                            class="icon-user"></i><span class="dropdn-link-txt">Account</span></a>

                                 @else

                                 <a href="#" class="dropdn-link js-dropdn-link" data-panel="#dropdnAccount"><i
                                    class="icon-user"></i><span class="dropdn-link-txt">{{ Auth::user()->name }}</span></a>

                                 @endif


                                </div>
                            </div>
                            <div class="dropdn dropdn_fullheight minicart">
                                <a href="#" class="dropdn-link js-dropdn-link minicart-link"
                                   data-panel="#dropdnMinicart">
                                    <i class="icon-basket"></i>
                                    <span class="minicart-qty"><span class="basket-item-count">
                                        <span class="badge badge-pill red"> 0 </span>
                                    </span></span>
                                    <!--<span class="minicart-total hide-mobile">৳ {{ \Cart::getTotal() }}</span>-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
