@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection




@section('body')
@if(isset($cart_data))
@if(Cookie::get('shopping_cart'))
@if(count($cart_data) > 0)


@php $total="0" @endphp
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>Shopping Cart</h1>
            </div>

            <div class="row">
                <div class="col-lg-11 col-xl-13">
                    <div class="cart-table">
                        <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                            <div class="cart-table-prd-image text-center">
                                Image
                            </div>
                            <div class="cart-table-prd-content-wrap">
                                <div class="cart-table-prd-info">Name</div>
                                <div class="cart-table-prd-qty">Qty</div>
                                <div class="cart-table-prd-price">Price</div>

                                <div class="cart-table-prd-action">&nbsp;</div>
                            </div>
                        </div>

                        @foreach($cart_data as $data)
                        <div class="cart-table-prd removediv">
                            <div class="cart-table-prd-image">
                                <a href="{{route('product_single_view',$data['item_slug'])}}" class="prd-img"><img
                                        class="lazyload fade-up"
                                        src="data:{{asset('/')}}{{ 'public/upload/'.$data['item_image'] }}"
                                        data-src="{{asset('/')}}{{ 'public/upload/'.$data['item_image'] }}" alt=""></a>
                            </div>
                            <div class="cart-table-prd-content-wrap newtest">
                                <div class="cart-table-prd-info">
                                    <div class="cart-table-prd-price">

                                        <div class="price-new">৳ {{number_format($data['item_price'], 2)}}</div>
                                    </div>
                                    <h2 class="cart-table-prd-name"><a
                                            href="product_show.php">{{$data['item_name']}}</a></h2>
                                </div>



                                <div class="cart-table-prd-qty">
                                    <div class="qty qty-changer  quantity cartpage">
                                        <input type="hidden" class="product_id" value="{{ $data['item_id']  }}">
                                        <button class="decrease decrement-btn changeQuantity">-</button>


                                        <input type="text" class="qty-input" maxlength="2" max="10"
                                            value="{{ $data['item_quantity']  }}">


                                        <button class="increase increment-btn changeQuantity">+</button>
                                    </div>
                                </div>


                                <div class="cart-table-prd-price-total">
                                    ৳ {{ number_format($data['item_quantity'] * $data['item_price'], 2) }}
                                </div>

                            </div>
                            @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp

                            <div class="cart-table-prd-action cpage">

                                <input type="hidden" value="{{ $data['item_id']  }}" class="p_id">
                                <button class="cart-table-prd-remove delete_cart_data"
                                    style="border: none !important; background-color:rgb(255, 255, 255) !important;"><i
                                        class="icon-recycle"></i></button>

                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-7 col-xl-5 mt-3 mt-md-0">

                    <div class="panel-group panel-group--style1 prd-block_accordion" id="productAccordion">

                        <!--<div class="panel">
                            <div class="panel-heading active">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse2">Discount Code</a>
                                    <span class="toggle-arrow"><span></span><span></span></span>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <p>Got a promo code? Then you're a few randomly combined numbers & letters away from fab savings!</p>
                                    <div class="form-inline mt-2">
                                        <input type="text" class="form-control form-control--sm" placeholder="Promotion/Discount Code">
                                        <button type="submit" class="btn">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-heading active">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#productAccordion" href="#collapse3">Note for the seller</a>
                                    <span class="toggle-arrow"><span></span><span></span></span>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse show">
                                <div class="panel-body">
                                    <textarea class="form-control form-control--sm textarea--height-100" placeholder="Text here"></textarea>
                                    <div class="card-text-info mt-2">
                                        <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if applicable).</p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>


                    <div class="mt-2"></div>
                    <div class="card-total">


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-left mb-2">

                                    <button class="btn btn--grey clear_cart " value="delete_data"><span>CLEAR
                                            CART</span>
                                        <i class="icon-refresh"></i></button>

                                </div>
                            </div>
                            <!--<div class="col-lg-4 ml-4">
                                <div class="text-right">
                                    <button class="btn btn--grey" name="clear_cart" value="update_all"><span>UPDATE CART</span><i class="icon-refresh"></i></button>
                                </div>
                            </div>-->
                        </div>





                        <div class="row d-flex " id="totalajaxcall">
                            <div class="col card-total-txt">Total</div>
                            <div class="col-auto card-total-price text-right totalpricingload">
                                ৳{{ number_format($total, 2) }} </div>
                        </div>
                        @if (Auth::guest())
                        <a href="{{ route('customer_dashoard.login') }}"
                            class="btn btn--full btn--lg"><span>Checkout</span></a>
                        @else
                        <a href="{{ route('shipping.index') }}" class="btn btn--full btn--lg"><span>Checkout</span></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else

<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
    <div class="holder mt-0">
        <div class="container">
            <div class="page404-bg">
                <div class="page404-text">
                    <div class="txt1"><img src="{{ asset('/') }}public/front/images/pages/tumbleweed.gif" alt=""></div>
                    <div class="txt2">Your shopping cart is empty!</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endif
@else
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Cart</span></li>
            </ul>
        </div>
    </div>
    <div class="holder mt-0">
        <div class="container">
            <div class="page404-bg">
                <div class="page404-text">
                    <div class="txt1"><img src="{{ asset('/') }}public/front/images/pages/tumbleweed.gif" alt=""></div>
                    <div class="txt2">Your shopping cart is empty!</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection



@section('scripts')





@endsection
