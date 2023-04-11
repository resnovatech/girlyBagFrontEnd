@extends('front.master.master')



@section('title')

    The GirlyBag

@endsection








@section('body')

    <?php


    use App\Http\Controllers\Admin\ProductController;


    ?>

    <div class="holder fullwidth full-nopad mt-0">
        <div class="container">
            <div class="bnslider-wrapper">
                <div class="bnslider bnslider--lg keep-scale" id="bnslider-001"
                     data-slick='{"arrows": true, "dots": true}'
                     data-autoplay="false" data-speed="6000" data-start-width="1917" data-start-height="764"
                     data-start-mwidth="1550" data-start-mheight="1400">
                    <div class="bnslider-slide">
                        <div class="bnslider-image-mobile lazyload"
                             data-bgset="{{ asset('/') }}public/front/images/slider/slider02_m.jpg"></div>
                        <div class="bnslider-image lazyload"
                             data-bgset="{{ asset('/') }}public/front/images/slider/slider02.jpg"></div>
                        <div class="bnslider-text-wrap bnslider-overlay ">
                            <div class="bnslider-text-content txt-middle txt-right txt-middle-m txt-center-m">
                                <div class="bnslider-text-content-flex ">
                                    <div class="bnslider-vert w-s-60 w-ms-100" style="padding: 0px">
                                        <div class="bnslider-text order-1 mt-sm bnslider-text--md text-center data-ini"
                                             data-animation="fadeInUp" data-animation-delay="800"
                                             data-fontcolor="#282828"
                                             data-fontweight="700" data-fontline="1.5">Order quality sanitary pads.
                                        </div>
                                        <div class="bnslider-text order-2 mt-sm bnslider-text--xs text-center data-ini"
                                             data-animation="fadeInUp" data-animation-delay="1000"
                                             data-fontcolor="#7c7c7c"
                                             data-fontweight="400" data-fontline="1.5">
                                            Choose your desired brand from our vast product pool.
                                        </div>
                                        <div class="btn-wrap text-center  order-4 mt-md" data-animation="fadeIn"
                                             data-animation-delay="2000" style="opacity: 1;">
                                            <a href="{{route('category')}}" class="btn">
                                                Shop now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bnslider-slide">
                        <div class="bnslider-image-mobile lazyload"
                             data-bgset="{{ asset('/') }}public/front/images/slider/slider01_m.jpg"></div>
                        <div class="bnslider-image lazyload"
                             data-bgset="{{ asset('/') }}public/front/images/slider/slider01.jpg"></div>
                        <div class="bnslider-text-wrap bnslider-overlay ">
                            <div class="bnslider-text-content txt-middle txt-left txt-middle-m txt-center-m">
                                <div class="bnslider-text-content-flex ">
                                    <div class="bnslider-vert w-s-60 w-ms-100" style="padding: 0px">
                                        <div class="bnslider-text order-1 mt-0 bnslider-text--md text-center data-ini"
                                             data-animation="fadeInUp" data-animation-delay="800"
                                             data-fontcolor="#282828"
                                             data-fontweight="700" data-fontline="1.5">Order quality diapers.
                                        </div>
                                        <div class="bnslider-text order-2 mt-sm bnslider-text--xs text-center data-ini"
                                             data-animation="fadeInUp" data-animation-delay="1000"
                                             data-fontcolor="#7c7c7c"
                                             data-fontweight="400" data-fontline="1.5">
                                            Choose your desired brand from our vast product pool.
                                        </div>
                                        <div class="btn-wrap text-center  order-4 mt-md" data-animation="fadeIn"
                                             data-animation-delay="2000" style="opacity: 1;">
                                            <a href="{{route('category')}}" class="btn">
                                                Shop now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bnslider-arrows container-fluid">
                    <div></div>
                </div>
                <div class="bnslider-dots container-fluid"></div>
            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-5">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="{{ asset('/') }}public/front/images/banners/banner1.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Sanitary Napkin Collection</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="{{ asset('/') }}public/front/images/banners/banner2.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Baby Biaper Collection</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="{{ asset('/') }}public/front/images/banners/banner3.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Period Calculation</h2>
                            <a href="#">Calculate now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holder holder-mt-medium">
        <div class="container">
            <ul class="brand-grid flex-wrap justify-content- js-color-hover-brand-grid">
                <li>
                    <a href="#" target="_self" class="d-block image-container" title="Brand">
                        <img class="lazyload fade-up"
                             src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/skins/fashion/brands/brand-fashion-06.webp"
                             alt="Brand">
                    </a>
                </li>
                <li>
                    <a href="#" target="_self" class="d-block image-container" title="Brand">
                        <img class="lazyload fade-up"
                             src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/skins/fashion/brands/brand-fashion-05.webp"
                             alt="Brand">
                    </a>
                </li>
                <li>
                    <a href="#" target="_self" class="d-block image-container" title="Brand">
                        <img class="lazyload fade-up"
                             src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/skins/fashion/brands/brand-fashion-01.webp"
                             alt="Brand">
                    </a>
                </li>
                <li>
                    <a href="#" target="_self" class="d-block image-container" title="Brand">
                        <img class="lazyload fade-up"
                             src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/skins/fashion/brands/brand-fashion-02.webp"
                             alt="Brand">
                    </a>
                </li>
                <li class="visuallyhidden js-hidden">
                    <a href="#" target="_self" class="d-block image-container" title="Brand">
                        <img class="lazyload fade-up"
                             src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/skins/fashion/brands/brand-fashion-03.webp"
                             alt="Brand">
                    </a>
                </li>
                <li class="visuallyhidden js-hidden">
                    <a href="#" target="_self" class="d-block image-container" title="Brand">
                        <img class="lazyload fade-up"
                             src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/skins/fashion/brands/brand-fashion-04.webp"
                             alt="Brand">
                    </a>
                </li>
            </ul>
            <div class="text-center mt-3 d-md-none">
                <a href="#" class="btn btn--grey brands-show-more js-brands-show-more"><span>Show More</span><span>Show
                    Less</span></a>
            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style">New arrival</h2>
                <div class="h-sub maxW-825">Hurry up! Limited</div>
            </div>
            <div class="prd-grid-wrap position-relative">
                <div
                    class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid"
                    data-grid-tab-content>

                    @foreach($product_napkin as $latestproduct)


                        <?php
                        $stock = ProductController::stock($latestproduct->id);
                        ?>



                        <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">


                            <div class="prd-inside">
                                <div class="prd-img-area">
                                    <a href="{{route('product_single_view',$latestproduct->product_slug)}}"
                                       class="prd-img image-hover-scale image-container"
                                       style="padding-bottom: 128.48%">
                                        <img src="data:{{asset('/')}}{{'public/upload/'.$stock}}"
                                             data-src="{{asset('/')}}{{'public/upload/'.$stock}}"
                                             alt="Oversized Cotton Blouse"
                                             class="js-prd-img lazyload fade-up">

                                        <div class="foxic-loader"></div>
                                        <div class="prd-big-squared-labels">

                                        </div>

                                    </a>
                                    <div class="prd-circle-labels">
                                        <a href="#"
                                           class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                           title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                        <a href="#"
                                           class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                           title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                        <a class="circle-label-qview  prd-hide-mobile view-product"
                                           data-productid="{{$latestproduct->id}}"><i class="icon-eye"></i><span>QUICK
                                        VIEW</span></a>
                                    </div>
                                </div>
                                <div class="prd-info">
                                    <div class="prd-info-wrap">

                                        @foreach($brands as $new_brand)
                                            @if($latestproduct->brand_id == $new_brand->id )
                                                <div class="prd-tag"><a href="#">{{ $new_brand->name }}</a>
                                                </div>
                                            @endif
                                        @endforeach


                                        <h2 class="prd-title"><a
                                                href="{{route('product_single_view',$latestproduct->product_slug)}}">{{$latestproduct->product_name}}</a>
                                        </h2>

                                        <div class="prd-action">
                                            <form action="#">
                                                <button class="btn js-prd-addtocart"
                                                        data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.png", "url":"product_show.php", "aspect_ratio":0.778}'>
                                                    Add To Cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="prd-hovers">
                                        <div class="prd-circle-labels">
                                            <div><a href="#"
                                                    class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                    title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                    href="#"
                                                    class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                    title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            </div>
                                            <div class="prd-hide-mobile">
                                                <a class="circle-label-qview view-product" data-fancybox
                                                   data-src="#news"
                                                   data-productid="{{$latestproduct->id}}"><i
                                                        class="icon-eye"></i><span>QUICK
                                                VIEW</span></a>
                                            </div>
                                        </div>
                                        <div class="prd-price">
                                        <!--<div class="price-old">$ {{$latestproduct->discount_amount}}</div>-->
                                            <div class="price-new">৳ {{$latestproduct->sell_price}}</div>
                                        </div>
                                        <div class="prd-action">
                                            <div class="prd-action-left product_data">


                                                <input type="hidden" class="product_id" value="{{ $latestproduct->id }}"
                                                       name="id">
                                                <input type="hidden" class="qty-input" value="1">

                                                <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"

                                                        data-product='{"name": "{{ $latestproduct->product_name }}", "path":
                                                    "{{asset('/')}}{{'public/upload/'.$stock}}", "url":"{{ url('/cart') }}", "aspect_ratio":0.778}'>
                                                    Add To Cart
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>

            <div class="prd-grid-wrap position-relative mt-4">

                <div
                    class="prd-grid data-to-show-4 data-to-show-lg-4 data-to-show-md-3 data-to-show-sm-2 data-to-show-xs-2 js-category-grid"
                    data-grid-tab-content>

                    @foreach($product_diaper as $latestproduct)


                        <?php
                        $stock = ProductController::stock($latestproduct->id);
                        ?>



                        <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">


                            <div class="prd-inside">
                                <div class="prd-img-area">
                                    <a href="{{route('product_single_view',$latestproduct->product_slug)}}"
                                       class="prd-img image-hover-scale image-container"
                                       style="padding-bottom: 128.48%">
                                        <img src="data:{{asset('/')}}{{'public/upload/'.$stock}}"
                                             data-src="{{asset('/')}}{{'public/upload/'.$stock}}"
                                             alt="Oversized Cotton Blouse"
                                             class="js-prd-img lazyload fade-up">

                                        <div class="foxic-loader"></div>
                                        <div class="prd-big-squared-labels">


                                        </div>

                                    </a>
                                    <div class="prd-circle-labels">
                                        <a href="#"
                                           class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                           title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                        <a href="#"
                                           class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                           title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                        <a class="circle-label-qview  prd-hide-mobile view-product"
                                           data-productid="{{$latestproduct->id}}"><i class="icon-eye"></i><span>QUICK
                                    VIEW</span></a>
                                    </div>
                                </div>
                                <div class="prd-info">
                                    <div class="prd-info-wrap">

                                        @foreach($brands as $new_brand)
                                            @if($latestproduct->brand_id == $new_brand->id )
                                                <div class="prd-tag"><a href="#">{{ $new_brand->name }}</a>
                                                </div>
                                            @endif
                                        @endforeach


                                        <h2 class="prd-title"><a
                                                href="{{route('product_single_view',$latestproduct->product_slug)}}">{{$latestproduct->product_name}}</a>
                                        </h2>

                                        <div class="prd-action">
                                            <form action="#">
                                                <button class="btn js-prd-addtocart"
                                                        data-product='{"name": "Oversized Cotton Blouse", "path":"images/skins/fashion/products/product-03-1.png", "url":"product_show.php", "aspect_ratio":0.778}'>
                                                    Add To Cart
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="prd-hovers">
                                        <div class="prd-circle-labels">
                                            <div><a href="#"
                                                    class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                                    title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a
                                                    href="#"
                                                    class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                    title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            </div>
                                            <div class="prd-hide-mobile">
                                                <a class="circle-label-qview view-product" data-fancybox
                                                   data-src="#news"
                                                   data-productid="{{$latestproduct->id}}"><i
                                                        class="icon-eye"></i><span>QUICK
                                            VIEW</span></a>
                                            </div>
                                        </div>
                                        <div class="prd-price">
                                        <!--<div class="price-old">$ {{$latestproduct->discount_amount}}</div>-->
                                            <div class="price-new">৳ {{$latestproduct->sell_price}}</div>
                                        </div>
                                        <div class="prd-action">
                                            <div class="prd-action-left product_data">


                                                <input type="hidden" class="product_id" value="{{ $latestproduct->id }}"
                                                       name="id">
                                                <input type="hidden" class="qty-input" value="1">
                                                <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"

                                                        data-product='{"name": "{{ $latestproduct->product_name }}", "path":
                                                    "{{asset('/')}}{{'public/upload/'.$stock}}", "url":"{{ url('/cart') }}", "aspect_ratio":0.778}'>
                                                    Add To Cart
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <div class="holder holder-mt-medium ">
        <div class="container">
            <a href="https://bit.ly/3eJX5XE" target="_blank" class="bnr-wrap bnr-">
                <div class="bnr custom-caption image-hover-scale bnr--middle bnr--right bnr--fullwidth">
                    <div class="bnr-img d-none d-sm-block image-container" style="padding-bottom: 41.36752136752137%">
                        <img src="" data-src="{{ asset('/') }}public/front/images/banners/banner-fashion2-full.webp"
                             class="lazyload fade-up" alt=""></div>
                    <div class="bnr-img d-sm-none image-container" style="padding-bottom: 74.3139407244786%">
                        <img src="" data-src="{{ asset('/') }}public/front/images/banners/banner-fashion2-full.webp"
                             class="lazyload fade-up" alt=""></div>
                    <div class="bnr-caption text-center" style="padding: 4% 4%; ">
                        <div class="bnr-caption-inside w-s-50 w-ms-100 title-wrap">
                            <h2 class="h1-style">Girl, Woman, Mother We fulfill everyone’s needs, under one roof!</h2>
                            <div class="h-sub mt-0">Delivery on time</div>
                            <div class="bnr-btn inherit mt-sm order-3">
                                <div class="btn">Buy Now</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="holder holder-mt-medium">
        <div class="container">
            <div class="title-wrap text-center ">
                <h2 class="h1-style text-center"><a href="blog.php" title="View all">Latest Magazine</a></h2>
                <div class="carousel-arrows" style="margin:0 auto 65px; width:50px;"></div>
            </div>
            <div class="post-prws post-prws-carousel post-prws--row js-post-prws-carousel"
                 data-slick='{"slidesToShow": 3, "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 2 }},{"breakpoint": 480,"settings": {"slidesToShow": 1 }}]}'>
                <div class="post-prw-vert col">
                    <a href="{{route('blog1')}}" class="post-prw-img image-hover-scale image-container"
                       style="padding-bottom: 54.44%">
                        <img class="fade-up w-100 lazyload" alt="The High-Street Brand Fashion"
                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/blog/blog01.jpg">
                    </a>
                    <h4 class="post-prw-title"><a href="{{route('blog1')}}">The High-Street Brand Fashion</a></h4>
                    <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar1"></i>
                            June 9, 2020
                        </div>
                    </div>
                </div>
                <div class="post-prw-vert col">
                    <a href="blog-post.html" class="post-prw-img image-hover-scale image-container"
                       style="padding-bottom: 54.44%">
                        <img class="fade-up w-100 lazyload" alt="The High-Street Brand Fashion"
                             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                             data-src="{{ asset('/') }}public/front/images/blog/blog02.jpg">
                    </a>
                    <h4 class="post-prw-title"><a href="blog-post.html">Trends to Try This Season</a></h4>
                    <div class="post-prw-links">
                        <div class="post-prw-date"><i class="icon-calendar1"></i>
                            June 3, 2020
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade productModal " style="margin-top: 5%;" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3 modal-data">


            </div>
        </div>
    </div>


@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            //edit product
            $(".view-product").click(function () {
                var productid = $(this).data('productid');
                //ajax
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('single_category')}}",
                    type: "POST",
                    data: {
                        'productid': productid
                    },
                    //dataType:'json',
                    success: function (data) {
                        $(".modal-data").html(data);
                        $('.productModal').modal('show');
                    },
                    error: function () {
                        toastr.error("Something went Wrong, Please Try again.");
                    }
                });

                //end ajax
            });


            //add data to cart with out loading


            // $(document).ready(function () {
            //     $(".addtocart").click(function (e) {
            //         var selct_ = $(this) //declare this
            //         e.preventDefault();
            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //         $.ajax({
            //             url: "{{ route('cart.store') }}",
            //             data: {
            //                 'product_id': $(this).data('product-id')

            //             },
            //             type: "post",
            //             success: function (result) {

            //                 $("#footer_cart").show();

            //                 // location.reload(true);


            //                 setTimeout(function () {
            //                     location.reload(true);
            //                 }, 2000);


            //             }
            //         });

            //     });
            // });


        });

    </script>

    <script>
        $(document).ready(function () {
            //add customer
            $("#qtyIddecrease").click(function () {
                var customerId = $("#number").val();
                var customerId1 = $("#qtyItemid").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('quantity_increase_dcrease_last')}}",
                    type: "POST",
                    data: {'customerId': customerId, 'customerId1': customerId1},
                    //dataType:'json',
                    success: function (data) {


                        if (data == 1) {
                            location.reload(true);
                        } else {
                            alert('Something Went wrong Please Try Again.');
                        }

                    },
                    error: function () {
                        alert("error ase");
                    }
                });
                //endajax
            });

        });
    </script>





@endsection
