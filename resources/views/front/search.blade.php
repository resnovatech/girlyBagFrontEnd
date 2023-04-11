@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection


@section('css')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

@endsection

@section('body')
<?php


use App\Http\Controllers\Admin\ProductController;


?>
 <?php
 $stock1=ProductController::stock($product_single_view->id);
 ?>
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="category.html">{{ $category_name }}</a></li>
                <li><span>{{ $product_single_view->product_name }}</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container js-prd-gallery" id="prdGallery">
            <div class="row prd-block prd-block--prv-bottom">
                <div class="col-md-8 col-lg-8 col-xl-8 aside--sticky js-sticky-collision">
                    <div class="aside-content">
                        <div class="mb-2 js-prd-m-holder"></div>
                        <div class="prd-block_main-image">
                            <div class="prd-block_main-image-holder" id="prdMainImage">
                                <div class="product-main-carousel js-product-main-carousel" data-zoom-position="inner">

                                    @foreach($product_photo as $new_photo)
                                    <div data-value="Beige"><span class="prd-img"><img
                                                    src="{{asset('/')}}{{'public/upload/'.$new_photo->image}}"
                                                    data-src="{{asset('/')}}{{'public/upload/'.$new_photo->image}}"
                                                    class="lazyload fade-up " alt=""</span>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="product-previews-wrapper">
                            <div class="product-previews-carousel js-product-previews-carousel">

                                @foreach($product_photo as $new_photo)
                                <a href="#" data-value="Beige"><span class="prd-img"><img
                                                src="{{asset('/')}}{{'public/upload/'.$new_photo->image}}"
                                                data-src="{{asset('/')}}{{'public/upload/'.$new_photo->image}}"
                                                class="lazyload fade-up" alt=""/></span></a>
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-lg-10 col-xl-10 mt-1 mt-md-0">
                    <div class="prd-block_info prd-block_info--style1"
                         data-prd-handle="/products/copy-of-suede-leather-mini-skirt">
                        <div class="prd-block_title-wrap">
                            <h1 class="prd-block_title">{{ $product_single_view->product_name }}</h1>
                        </div>
                        <div class="prd-block_info-top prd-block_info_item order-0 order-md-2">
                            <div class="prd-block_price prd-block_price--style2">

                                <div class="prd-block_price--actual">৳ {{ $product_single_view->sell_price }}</div>

                            </div>
                        </div>
                        <div class="prd-block_description prd-block_info_item ">
                            <h3>Short description</h3>
                            <p>{!! $product_single_view->sh !!}</p>
                           <!-- <div class="mt-1"></div>
                            <div class="row vert-margin-less">
                                <div class="col-sm">
                                    <ul class="list-marker">
                                        <li>100% Polyester</li>
                                        <li>Lining:100% Viscose</li>
                                    </ul>
                                </div>
                                <div class="col-sm">
                                    <ul class="list-marker">
                                        <li>Do not dry clean</li>
                                        <li>Only non-chlorine</li>
                                    </ul>
                                </div>
                            </div>-->
                        </div>



                        <div class="prd-block_info_item prd-block_info-when-arrives d-none" data-when-arrives>
                            <div class="prd-block_links prd-block_links m-0 d-inline-flex">
                                <i class="icon-email-1"></i>
                                <div><a href="#" data-follow-up="" data-name="Oversize Cotton Dress"
                                        class="prd-in-stock" data-src="#whenArrives">Inform me when the item arrives</a>
                                </div>
                            </div>
                        </div>
                        <div class="prd-block_info-box prd-block_info_item">
                            <div class="two-column">


                                <p class="prd-taxes">Tax Info:
                                    <span>Tax included.</span>
                                </p>
                                <p>Collection: <span> <a href="collections.html" data-toggle="tooltip"
                                                         data-placement="top"
                                                         data-original-title="View all">{{ $category_name }}</a></span></p>
                                <p>Reward-Point: <span data-sku="">{{ $product_single_view->reward_point_product_count }}</span></p>



                                @foreach($brands as $new_brand)
                                            @if($product_single_view->brand_id == $new_brand->id )


                                            <p>Brand: <span>{{ $new_brand->name }}</span></p>



                                            @endif
                                            @endforeach


                               </div>
                        </div>
                        <div class="order-0 order-md-100">

                                <div class="prd-block_options">
                                    <div class="prd-size swatches">

                                    </div>
                                </div>
                                <div class="prd-block_actions prd-block_actions--wishlist">
                                    <div class="prd-block_qty">

                                        <div class="qty qty-changer productnew">
                                            <button class="decrease js-qty-button"></button>
                                            <input type="number" class="qty-input" id="number" name="quantity" value="1"
                                                   data-min="1" data-max="1000">
                                                   <input type="hidden" value="{{ $product_single_view->id }}" class="product_id" id="id2" name="id">
                                            <button class="increase js-qty-button"></button>
                                        </div>
                                    </div>
                                    <div class="btn-wrap">








                                        <button class="btn btn--add-to-cart js-prd-addtocart add-to-cart-btnnew"
                                        data-product='{"name":"{{ $product_single_view->product_name }}", "url": "{{ url('/cart') }}", "path":
                                            "{{asset('/')}}{{'public/upload/'.$stock1}}", "aspect_ratio ": "0.78"}'>
                                                                            Add to cart
                                                                        </button>


                                    </div>
                                   <!-- <div class="btn-wishlist-wrap">
                                        <a href="#"
                                           class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist"
                                           title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                        <a href="#"
                                           class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist"
                                           title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                    </div>-->
                                </div>

                            <div class="prd-block_agreement prd-block_info_item order-0 order-md-100 text-right"
                                 data-agree>
                                <input id="agreementCheckboxProductPage" class="js-agreement-checkbox"
                                       data-button=".shopify-payment-agree" name="agreementCheckboxProductPage"
                                       type="checkbox">
                                <label for="agreementCheckboxProductPage"><a href="#" data-fancybox
                                                                             class="modal-info-link"
                                                                             data-src="#agreementInfo">I agree to the
                                        terms of service</a></label>
                            </div>
                        </div>
                        <div class="prd-block_info_item">
                            <ul class="prd-block_links list-unstyled">
                                <li><i class="icon-delivery-1"></i><a href="#" data-fancybox class="modal-info-link"
                                                                      data-src="#deliveryInfo">Delivery and Return</a>
                                </li>
                                <!--<li><i class="icon-email-1"></i><a href="#" data-fancybox class="modal-info-link"
                                                                   data-src="#contactModal">Ask about this product</a>
                                </li>-->
                            </ul>
                            <div id="deliveryInfo" style="display: none;"
                                 class="modal-info-content modal-info-content-lg">
                                <div class="modal-info-heading">
                                    <div class="mb-1"><i class="icon-delivery-1"></i></div>
                                    <h2>Delivery and Return</h2>
                                </div>
                                <br>
                                <h5>Our parcel courier service</h5>
                                <p>Foxic is proud to offer an exceptional international parcel shipping service. It is
                                    straightforward and very easy to organise international parcel shipping. Our
                                    customer service team works around the clock to make sure that you receive high
                                    quality courier service from start to finish.</p>
                                <p>Sending a parcel with us is simple. To start the process you will first need to get a
                                    quote using our free online quotation service. From this, you’ll be able to navigate
                                    through the online form to book a collection date for your parcel, selecting a
                                    shipping day suitable for you.</p>
                                <br>
                                <h5>Shipping Time</h5>
                                <p>The shipping time is based on the shipping method you chose.<br>
                                    EMS takes about 5-10 working days for delivery.<br>
                                    DHL takes about 2-5 working days for delivery.<br>
                                    DPEX takes about 2-8 working days for delivery.<br>
                                    JCEX takes about 3-7 working days for delivery.<br>
                                    China Post Registered Mail takes 20-40 working days for delivery.</p>
                            </div>
                            <div id="contactModal" style="display: none;"
                                 class="modal-info-content modal-info-content-sm">
                                <div class="modal-info-heading">
                                    <div class="mb-1"><i class="icon-envelope"></i></div>
                                    <h2>Have a question?</h2>
                                </div>
                                <form method="post" action="#" id="contactForm" class="contact-form">
                                    <div class="form-group">
                                        <input type="text" name="contact[name]" class="form-control form-control--sm"
                                               placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="contact[email]" class="form-control form-control--sm"
                                               placeholder="Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="contact[phone]" class="form-control form-control--sm"
                                               placeholder="Phone Number">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control textarea--height-170" name="contact[body]"
                                                  placeholder="Message" required="">Hi! I need next info about the "Oversize Cotton Dress":</textarea>
                                    </div>
                                    <button class="btn" type="submit">Ask our consultant</button>
                                    <p class="p--small mt-15 mb-0">and we will contact you soon</p><input
                                            name="recaptcha-v3-token" type="hidden"
                                            value="03AGdBq27T8WvzvZu79QsHn8lp5GhjNX-w3wkcpVJgCH15Ehh0tu8c9wTKj4aNXyU0OLM949jTA4cDxfznP9myOBw9m-wggkfcp1Cv_vhsi-TQ9E_EbeLl33dqRhp2sa5tKBOtDspTgwoEDODTHAz3nuvG28jE7foIFoqGWiCqdQo5iEphqtGTvY1G7XgWPAkNPnD0B9V221SYth9vMazf1mkYX3YHAj_g_6qhikdQDsgF2Sa2wOcoLKWiTBMF6L0wxdwhIoGFz3k3VptYem75sxPM4lpS8Y_UAxfvF06fywFATA0nNH0IRnd5eEPnnhJuYc5LYsV6Djg7_S4wLBmOzYnahC-S60MHvQFf-scQqqhPWOtgEKPihUYiGFBJYRn2p1bZwIIhozAgveOtTNQQi7FGqmlbKkRWCA">
                                </form>
                            </div>
                        </div>
                        <div class="prd-block_info_item">
                            <img class="img-responsive lazyload d-none d-sm-block"
                                 src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="{{ asset('/') }}public/front/images/payment/safecheckout.webp" alt="">
                            <img class="img-responsive lazyload d-sm-none"
                                 src="data:{{ asset('/') }}public/front/image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                 data-src="{{ asset('/') }}public/front/images/payment/safecheckout-m.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="holder prd-block_links-wrap-bg d-none d-md-block">
        <div class="prd-block_links-wrap prd-block_info_item container mt-2 mt-md-5 py-1">
            <div class="prd-block_link"><span><i class="icon-call-center"></i>24/7 Support</span></div>
            <div class="prd-block_link">
                <span>Use promocode  FOXIC to get 15% discount!</span></div>
            <div class="prd-block_link"><span><i class="icon-delivery-truck"></i> Fast Shipping</span></div>
        </div>
    </div>
    <div class="holder mt-3 mt-md-5">
        <div class="container">
           <ul class="nav nav-tabs product-tab">
                <li class="nav-item">Description
                        <span class="toggle-arrow"><span></span><span></span></span>
                    </li>

                    {!! $product_single_view->des !!}

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade" id="Tab1">
                    {!! $product_single_view->des !!}
                </div>


            </div>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="title-wrap text-center">
                <h2 class="h1-style">You may also like</h2>
                <div class="carousel-arrows carousel-arrows--center"></div>
            </div>
            <div class="prd-grid prd-carousel js-prd-carousel slick-arrows-aside-simple slick-arrows-mobile-lg data-to-show-4 data-to-show-md-3 data-to-show-sm-3 data-to-show-xs-2"
                 data-slick='{"slidesToShow": 4, "slidesToScroll": 2, "responsive":
                 [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},{"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},
                 {"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                 @foreach($randomOder_list as $newRand)
                 <?php
                            $stock=ProductController::stock($newRand->id);
                            ?>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="{{route('product_single_view',$newRand->product_slug)}}" class="prd-img image-hover-scale image-container"
                               style="padding-bottom: 128.48%">
                                <img src="data:{{asset('/')}}{{'public/upload/'.$stock}}"
                                     data-src="{{asset('/')}}{{'public/upload/'.$stock}}"
                                     alt="Oversized Cotton Blouse" class="js-prd-img lazyload fade-up">
                                <div class="foxic-loader"></div>
                            </a>
                            <div class="prd-circle-labels">
                                <a href="#"
                                   class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                   title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
                                                                                                   class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                                                   title="Remove From Wishlist"><i
                                            class="icon-heart-hover"></i></a>
                                <a  class="circle-label-qview view-product prd-hide-mobile"
                                data-productid="{{$newRand->id}}"><i
                                            class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-tag"><a href="#">Banita</a></div>
                                <h2 class="prd-title"><a href="{{route('product_single_view',$newRand->product_slug)}}">{{ $newRand->product_name }}</a></h2>

                                <div class="prd-action">
                                    <div class="prd-action-left">


                                            <input type="hidden" value="{{ $newRand->id }}"  name="id">

<button id="footer_cart" class="btn addtocart js-prd-addtocart" data-product-id="{{ $newRand->id }}" data-product='{"name": "{{ $newRand->product_name }}",
    "path":
                                                "{{asset('/')}}{{'public/upload/'.$stock}}", "url":"{{ url('/cart') }}", "aspect_ratio":0.778}'>
                                                Add To Cart
                                            </button>

                                    </div>
                                </div>
                            </div>
                            <div class="prd-hovers">
                                <div class="prd-circle-labels">
                                    <div><a href="#"
                                            class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0"
                                            title="Add To Wishlist"><i class="icon-heart-stroke"></i></a><a href="#"
                                                                                                            class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0"
                                                                                                            title="Remove From Wishlist"><i
                                                    class="icon-heart-hover"></i></a></div>
                                    <div class="prd-hide-mobile"><a
                                                                    class="circle-label-qview view-product"
                                                                    data-productid="{{$newRand->id}}"><i
                                                    class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                    <div class="price-old">$ {{$newRand->discount_amount}}</div>
                                    <div class="price-new">$ {{$newRand->sell_price}}</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left product_data">
                                        <input type="hidden" class="qty-input" value="1">

                                               <input type="hidden" value="{{ $newRand->id }}" class="product_id"  name="id">

   <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart" data-product-id="{{ $newRand->id }}" data-product='{"name": "{{ $newRand->product_name }}", "path":
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
    $(document).ready(function(){
        $('.add-to-cart-btnnew').click(function (e) {
                          e.preventDefault();

                         // alert('i am here');

                           $.ajaxSetup({
                               headers: {
                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                               }
                           });

                           var product_id = $("#id2").val();
               var quantity = $("#number").val();

                        //alert(product_id);

                           $.ajax({
                               url: "{{ route('cart.store') }}",
                               method: "POST",
                               data: {
                                   'quantity': quantity,
                                   'product_id': product_id,
                               },
                               success: function (response) {
                                   alertify.set('notifier','position','top-center');
                                   alertify.success(response.status);

                                   $("#footer_cart1").show();
                                   cartload();
                                  //alert("success");
                               },
                           });
                      });
    //edit product
       $(".view-product").click(function(){
         var productid=$(this).data('productid');
        //ajax
         $.ajax({
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('single_category')}}",
          type:"POST",
          data:{'productid':productid},
                //dataType:'json',
                success:function(data){
                    $(".modal-data").html(data);
                  $('.productModal').modal('show');
                },
                error:function(){
                  toastr.error("Something went Wrong, Please Try again.");
                }
              });

          //end ajax
       });








        });

       </script>


       @endsection
