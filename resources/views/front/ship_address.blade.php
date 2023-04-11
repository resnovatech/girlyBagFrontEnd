@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection

@section('css')


@endsection
<?php


use App\Http\Controllers\MainController;


?>



@section('body')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Checkout</span></li>
            </ul>
        </div>
    </div>
    <form action="{{ route('shipping.store') }}" method="post" class="needs-validation" novalidate>
        @csrf

        @if(Auth::guest())

        <div class="holder">
            <div class="container">
                <h1 class="text-center">Checkout page</h1>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <h2>Shipping Address</h2>
                                <p><a href="{{ route('customer_dashoard.login') }}">Login</a> or <a
                                        href="{{ route('customer_dashoard.register') }}">Register</a> for
                                    faster payment.</p>
                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>First Name:</label>
                                        <div class="form-group">
                                            @if(Session::has('fname'))
                                            <input type="text" class="form-control form-control--sm" name="fname"
                                                id="fname" value="{{ Session::get('fname') }}" required>
                                            @else
                                            <input type="text" class="form-control form-control--sm" name="fname"
                                                id="fname" required>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Last Name:</label>
                                        <div class="form-group">
                                            @if(Session::has('lname'))
                                            <input type="text" class="form-control form-control--sm" name="lname"
                                                id="fname" value="{{ Session::get('lname') }}" required>
                                            @else
                                            <input type="text" class="form-control form-control--sm" name="lname"
                                                id="fname" required>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>Country:</label>
                                <div class="form-group select-wrapper">
                                    @if(Session::has('country'))
                                    <select class="form-control form-control--sm" name="country" required>
                                        <option value="BanglaDesh"
                                            {{ Session::get('country') == 'BanglaDesh' ? 'selected':'' }}>BanglaDesh
                                        </option>

                                    </select>

                                    @else
                                    <select class="form-control form-control--sm" name="country" required>
                                        <option value="BanglaDesh">BanglaDesh</option>

                                    </select>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <label>Area:</label>
                                        <div class="form-group select-wrapper">
                                            @if(Session::has('area_name'))

                                            <select class="form-control form-control--sm" name="dis" id="areaId">
                                                @foreach($ship_address as $address)
        <option value="{{ $address->area }}" {{ $address->area == Session::get('area_name') ? 'selected':''}}>{{ $address->area }}</option>
                                                 @endforeach
                                            </select>
                                            @else
                                            <select class="form-control form-control--sm" name="dis" id="areaId">
                                                @foreach($ship_address as $address)
                                                <option value="{{ $address->area }}">{{ $address->area }}</option>
                                                 @endforeach
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Phone:</label>
                                        <div class="form-group">
                                            @if(Session::has('phone'))

                                            <input type="text" class="form-control form-control--sm" name="phone"
                                                value="{{ Session::get('phone') }}" required>

                                            @else
                                            <input type="text" class="form-control form-control--sm" name="phone"
                                                required>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>Address 1:</label>
                                <div class="form-group">
                                    @if(Session::has('address'))
                                    <input type="text" class="form-control form-control--sm" name="address"
                                        value="{{ Session::get('address') }}" required>
                                    @else
                                    <input type="text" class="form-control form-control--sm" name="address" required>
                                    @endif
                                </div>
                                <div class="mt-2"></div>
                                <label>Last Period Date:ss</label>
                                <div class="form-group">
                                    @if(Session::has('pdate'))
                                    <input type="date" class="form-control form-control--sm" name="pdate"
                                        value="{{ Session::get('pdate') }}" required>
                                    @else
                                    <input type="date" class="form-control form-control--sm" name="pdate" required>
                                    @endif
                                </div>
                                <div class="clearfix">
                                    <input id="formcheckoutCheckbox1" name="cstatus" type="checkbox" value="1">
                                    <label for="formcheckoutCheckbox1">Save address to my account</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 mt-2 mt-md-0">
                        <!--<div class="card">
                                <div class="card-body">
                                    <h2>Devivery Methods</h2>
                                    <div class="clearfix">
                                        <input id="formcheckoutRadio1" value="" name="radio1" type="radio" class="radio"
                                               checked="checked">
                                        <label for="formcheckoutRadio1">Standard Delivery $2.99 (3-5 days)</label>
                                    </div>
                                    <div class="clearfix">
                                        <input id="formcheckoutRadio2" value="" name="radio1" type="radio" class="radio">
                                        <label for="formcheckoutRadio2">Express Delivery $10.99 (1-2 days)</label>
                                    </div>
                                </div>
                            </div>-->
                        <div class="mt-2"></div>
                        <div class="card">
                            <div class="card-body">
                                <h2>Payment Methods</h2>
                                <div class="clearfix">
                                    <input id="formcheckoutRadio4" value="Cash On Delivery" name="payment_type"
                                        type="radio" class="radio" checked="checked">
                                    <label for="formcheckoutRadio4">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2"></div>
                        <div class="card">
                            <div class="card-body">
                                <h3>Order Comment</h3>

                                @if(Session::has('order_comment'))

                                <textarea class="form-control form-control--sm textarea--height-200"
                                    placeholder="Place your comment here"
                                    name="order_comment">{{ Session::get('order_comment') }}</textarea>

                                @else
                                <textarea class="form-control form-control--sm textarea--height-200"
                                    placeholder="Place your comment here" name="order_comment"></textarea>

                                @endif

                                <div class="card-text-info mt-2">
                                    <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if applicable).</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3"></div>
                <h2 class="custom-color">Order Summary</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-table cart-table--sm pt-3 pt-md-0">
                            <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                                <div class="cart-table-prd-image text-center">
                                    Image
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">Name</div>
                                    <div class="cart-table-prd-qty">Qty</div>
                                    <div class="cart-table-prd-price">Price</div>
                                </div>
                            </div>
                            @foreach($cartCollection as $item)
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image">
                                    <a href="{{route('product_single_view',$item->attributes->product_slug)}}"
                                        class="prd-img"><img class="lazyload fade-up"
                                            src="data:{{asset('/')}}{{ 'public/upload/'.$item->attributes->image }}"
                                            data-src="{{asset('/')}}{{ 'public/upload/'.$item->attributes->image }}"
                                            alt=""></a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <h2 class="cart-table-prd-name"><a
                                                href="{{route('product_single_view',$item->attributes->product_slug)}}">{{ $item->name }}</a>
                                        </h2>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer">
                                            <input type="text" class="qty-input disabled" value="{{ $item->quantity }}"
                                                data-min="0" data-max="1000">
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        ৳ {{ \Cart::get($item->id)->getPriceSum() }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 mt-2 mt-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h3>Apply Promocode</h3>
                                <p>Got a promo code? Then you're a few randomly combined numbers & letters away from fab
                                    savings!</p>

                                @if(Session::has('final_price'))

                                <button type="submit" class="btn" value="removecupon" name="cupon">Remove Cupon</button>
                                @else

                                <div class="form-inline mt-2">
                                    <input type="hidden" class="form-control form-control--sm"
                                        placeholder="Promotion/Discount Code" name="total_price"
                                        value="{{ \Cart::getTotal() }}">




                                    <input type="text" class="form-control form-control--sm"
                                        placeholder="Promotion/Discount Code" name="code">

                                    <button type="submit" class="btn" value="cupon" name="cupon">Apply</button>
                                </div>

                                @endif

                            </div>
                        </div>
                        <div class="mt-2"></div>
                        @if(Session::has('final_price'))



                        <div class="cart-total-sm">

                            <span>Total Amount</span>
                            <span class="card-total-price">৳ {{ \Cart::getTotal() }}</span>
                        </div>

                        <div class="cart-total-sm">

                            <span>Discount Amount</span>
                            <span class="card-total-price">৳ {{ Session::get('final_price') }}</span>
                        </div>
                        <div class="cart-total-sm">

                            <span>Final Amount</span>
                            <span class="card-total-price">৳
                                {{ \Cart::getTotal() -  Session::get('final_price')}}</span>
                        </div>


                        @else
                        <div class="cart-total-sm">

                            <span>Subtotal</span>
                            <span class="card-total-price">৳ {{ \Cart::getTotal() }} </span>
                        </div>

                        @endif
                        <div class="clearfix mt-2">
                            <button type="submit" class="btn btn--lg w-100">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else

        <?php
            $stock=MainController::stock(Auth::user()->id);
            ?>


        <?php
            $stock1=MainController::stock1(Auth::user()->id);
            ?>



        <div class="holder">
            <div class="container">
                <h1 class="text-center">Checkout page</h1>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">

                                <!--empty data check -->
                                <h2>Shipping Address</h2>

                                @if($stock1 == 0)

                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>First Name:</label>
                                        <div class="form-group">
                                            @if(Session::has('fname'))
                                            <input type="text" class="form-control form-control--sm" name="fname"
                                                id="fname" value="{{ Session::get('fname') }}">
                                            @else
                                            <input type="text" class="form-control form-control--sm" name="fname"
                                                id="fname" value="{{Auth::user()->name}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Last Name:</label>
                                        <div class="form-group">
                                            @if(Session::has('lname'))
                                            <input type="text" class="form-control form-control--sm" name="lname"
                                                id="fname" value="{{ Session::get('lname') }}">
                                            @else
                                            <input type="text" class="form-control form-control--sm" name="lname"
                                                id="fname" value="{{Auth::user()->lname}}">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>Country:</label>
                                        <div class="form-group select-wrapper">
                                            @if(Session::has('country'))
                                            <select class="form-control form-control--sm" name="country">
                                                <option value="BanglaDesh"
                                                    {{ Session::get('country') == 'BanglaDesh' ? 'selected':'' }}>
                                                    BanglaDesh
                                                </option>

                                            </select>

                                            @else
                                            <select class="form-control form-control--sm" name="country">
                                                <option value="BanglaDesh">BanglaDesh</option>

                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Area:</label>
                                        <div class="form-group select-wrapper">
                                            @if(Session::has('area_name'))

                                            <select class="form-control form-control--sm" name="dis" id="areaId">
                                                @foreach($ship_address as $address)
        <option value="{{ $address->area }}" {{ $address->area == Session::get('area_name') ? 'selected':''}}>{{ $address->area }}</option>
                                                 @endforeach
                                            </select>
                                            @else
                                            <select class="form-control form-control--sm" name="dis" id="areaId">
                                                @foreach($ship_address as $address)
                                                <option value="{{ $address->area }}">{{ $address->area }}</option>
                                                 @endforeach
                                            </select>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>Phone:</label>
                                        <div class="form-group">
                                            @if(Session::has('phone'))

                                            <input type="text" class="form-control form-control--sm" name="phone"
                                                value="{{ Session::get('phone') }}">

                                            @else
                                            <input type="text" class="form-control form-control--sm" name="phone">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Last Period Date:</label>
                                        <div class="form-group">
                                            @if(Session::has('pdate'))
                                            <input type="date" class="form-control form-control--sm" name="pdate"
                                                value="{{ Session::get('pdate') }}">
                                            @else
                                            <input type="date" class="form-control form-control--sm" name="pdate">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>long does a period last?</label>
                                        <div class="form-group">
                                            @if(Session::has('total_days'))

                                            <input type="text" class="form-control form-control--sm" name="total_days"
                                                value="{{ Session::get('total_days') }}">

                                            @else
                                            <input type="text" class="form-control form-control--sm" name="total_days">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>How long is your cycle?</label>
                                        <div class="form-group">
                                            @if(Session::has('cycle'))

                                            <input type="text" class="form-control form-control--sm" name="cycle"
                                                value="{{ Session::get('cycle') }}">

                                            @else
                                            <input type="text" class="form-control form-control--sm" name="cycle">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>Address 1:</label>
                                <div class="form-group">
                                    @if(Session::has('address'))
                                    <input type="text" class="form-control form-control--sm" name="address"
                                        value="{{ Session::get('address') }}">
                                    @else
                                    <input type="text" class="form-control form-control--sm" name="address">
                                    @endif
                                </div>
                                <div class="mt-2"></div>

                                <div class="clearfix">
                                    <input id="formcheckoutCheckbox1" name="cstatus" type="checkbox" value="1">
                                    <label for="formcheckoutCheckbox1">Save address to my account</label>
                                </div>
                                @else

                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>First Name:</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control--sm" name="fname"
                                                value="{{ $stock->Fname }}">
                                            <input type="hidden" class="form-control form-control--sm" name="id"
                                                value="{{ $stock->id }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Last Name:</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control--sm" name="lname"
                                                value="{{ $stock->lname }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>Country:</label>
                                <div class="form-group select-wrapper">
                                    <select class="form-control form-control--sm" name="country">
                                        <option value="BanglaDesh">BanglaDesh</option>

                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <label>Area:</label>
                                        <div class="form-group select-wrapper">
                                            @if(Session::has('area_name'))

                                            <select class="form-control form-control--sm" name="dis" id="areaId">
                                                @foreach($ship_address as $address)
                                                <option value="{{ $address->area }}"
                                                    {{ $address->area == Session::get('area_name') ? 'selected':''}}>
                                                    {{ $address->area }}</option>
                                                @endforeach
                                            </select>
                                            @else
                                            <select class="form-control form-control--sm" name="dis" id="areaId">
                                                @foreach($ship_address as $address)
                                                <option value="{{ $address->area }}">{{ $address->area }}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>Phone:</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control--sm" name="phone"
                                                value="{{ $stock->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2"></div>
                                <label>Address 1:</label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control--sm" name="address"
                                        value="{{ $stock->address }}">
                                </div>
                                <div class="mt-2"></div>
                                <label>Last Period Date:</label>
                                <div class="form-group">
                                    @if(Session::has('pdate'))
                                    <input type="text" class="form-control form-control--sm" name="pdate"
                                        value="{{ Session::get('pdate') }}" id="datetimepicker12" required>
                                    @else
                                    <input type="text" class="form-control form-control--sm" name="pdate"
                                        id="datetimepicker12" required>
                                    @endif
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-9">
                                        <label>long does a period last?</label>
                                        <div class="form-group">
                                            @if(Session::has('total_days'))

                                            <input type="text" class="form-control form-control--sm" name="total_days"
                                                value="{{ Session::get('total_days') }}">

                                            @else
                                            <input type="text" class="form-control form-control--sm" name="total_days">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <label>How long is your cycle?</label>
                                        <div class="form-group">
                                            @if(Session::has('cycle'))

                                            <input type="text" class="form-control form-control--sm" name="cycle"
                                                value="{{ Session::get('cycle') }}">

                                            @else
                                            <input type="text" class="form-control form-control--sm" name="cycle">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <input id="formcheckoutCheckbox1" name="cstatus" type="checkbox" value="1">
                                    <label for="formcheckoutCheckbox1">Save address to my account</label>
                                </div>
                                @endif
                                <!--empty data check -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 mt-2 mt-md-0">
                        <!--<div class="card">
                                <div class="card-body">
                                    <h2>Devivery Methods</h2>
                                    <div class="clearfix">
                                        <input id="formcheckoutRadio1" value="" name="radio1" type="radio" class="radio"
                                               checked="checked">
                                        <label for="formcheckoutRadio1">Standard Delivery $2.99 (3-5 days)</label>
                                    </div>
                                    <div class="clearfix">
                                        <input id="formcheckoutRadio2" value="" name="radio1" type="radio" class="radio">
                                        <label for="formcheckoutRadio2">Express Delivery $10.99 (1-2 days)</label>
                                    </div>
                                </div>
                            </div>-->
                        <div class="mt-2"></div>
                        <div class="card">
                            <div class="card-body">
                                <h2>Payment Methods</h2>
                                <div class="clearfix">
                                    <input id="formcheckoutRadio4" value="Cash On Delivery" name="payment_type"
                                        type="radio" class="radio" checked="checked">
                                    <label for="formcheckoutRadio4">Cash On Delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2"></div>
                        <div class="card">
                            <div class="card-body">
                                <h3>Order Comment</h3>


                                @if(Session::has('order_comment'))

                                <textarea class="form-control form-control--sm textarea--height-200"
                                    placeholder="Place your comment here"
                                    name="order_comment">{{ Session::get('order_comment') }}</textarea>

                                @else
                                <textarea class="form-control form-control--sm textarea--height-200"
                                    placeholder="Place your comment here" name="order_comment"></textarea>

                                @endif


                                <div class="card-text-info mt-2">
                                    <p>*Savings include promotions, coupons, rueBUCKS, and shipping (if applicable).</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <div class="mt-3"></div>
                <h2 class="custom-color">Order Summary</h2>
                <!--new cart condition -->
                @if(isset($cart_data))
                @if(Cookie::get('shopping_cart'))
                @php $total="0" @endphp
                <!-- new cart condition -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-table cart-table--sm pt-3 pt-md-0">
                            <div class="cart-table-prd cart-table-prd--head py-1 d-none d-md-flex">
                                <div class="cart-table-prd-image text-center">
                                    Image
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">Name</div>
                                    <div class="cart-table-prd-qty">Qty</div>
                                    <div class="cart-table-prd-price">Price</div>
                                </div>
                            </div>
                            @foreach($cart_data as $data)
                            <div class="cart-table-prd">
                                <div class="cart-table-prd-image">
                                    <a href="{{route('product_single_view',$data['item_slug'])}}" class="prd-img"><img
                                            class="lazyload fade-up"
                                            src="data:{{asset('/')}}{{ 'public/upload/'.$data['item_image'] }}"
                                            data-src="{{asset('/')}}{{ 'public/upload/'.$data['item_image'] }}"
                                            alt=""></a>
                                </div>
                                <div class="cart-table-prd-content-wrap">
                                    <div class="cart-table-prd-info">
                                        <h2 class="cart-table-prd-name"><a
                                                href="{{route('product_single_view',$data['item_slug'])}}">{{$data['item_name']}}</a>
                                        </h2>
                                    </div>
                                    <div class="cart-table-prd-qty">
                                        <div class="qty qty-changer">
                                            <input type="text" class="qty-input disabled"
                                                value="{{ $data['item_quantity']  }}" data-min="0" data-max="1000">
                                        </div>
                                    </div>
                                    <div class="cart-table-prd-price-total">
                                        ৳ {{ number_format($data['item_quantity'] * $data['item_price'], 2) }}
                                    </div>
                                </div>
                            </div>
                            @php $total = $total + ($data["item_quantity"] * $data["item_price"]) @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 mt-2 mt-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h3>Apply Promocode</h3>
                                <p>Got a promo code? Then you're a few randomly combined numbers & letters away from fab
                                    savings!</p>
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session('success') }}
                                </div>
                                @endif
                                @if (session('error'))
                                <div class="alert alert-danger alert-dismissible>">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if(Session::has('final_price'))

                                <button type="submit" class="btn" value="removecupon" name="cupon">Remove Cupon</button>
                                @else

                                <div class="form-inline mt-2">
                                    <input type="hidden" class="form-control form-control--sm"
                                        placeholder="Promotion/Discount Code" name="total_price"
                                        value="{{ number_format($total, 2) }}">




                                    <input type="text" class="form-control form-control--sm"
                                        placeholder="Promotion/Discount Code" name="code">

                                    <button type="submit" class="btn" value="cupon" name="cupon">Apply</button>
                                </div>

                                @endif

                            </div>
                        </div>
                        <div class="mt-2"></div>
                        @if(Session::has('final_price'))



                        <div class="cart-total-sm">

                            <span>Total Amount</span>
                            <span class="card-total-price">৳ {{ number_format($total, 2) }}</span>
                        </div>

                        <div class="cart-total-sm">

                            <span>Discount Amount</span>
                            <span class="card-total-price">৳ {{ Session::get('final_price') }}</span>
                        </div>
                        <div class="cart-total-sm">

                            <!--delivary charge code-->
                            @if(Session::has('area_name'))
                            <span>Delivary Charge</span>
                            <span class="card-total-price">৳ {{ Session::get('ship_price') }} </span>
                            <span>Final Amount</span>
                            <span class="card-total-price">৳
                                {{ number_format($total, 2) -  Session::get('final_price') +  Session::get('ship_price')}}</span>

                                  @php

                                $put_data_on_session = number_format($total, 2) -  Session::get('final_price') + Session::get('ship_price');

                                Session::put('CUPONPRICEDATA',$put_data_on_session);


                                @endphp


                            @else

                            <!--delivary charge code-->

                            <span>Final Amount</span>
                            <span class="card-total-price">৳
                                {{ number_format($total, 2) -  Session::get('final_price')}}</span>

                                  @php

                                $put_data_on_session = number_format($total, 2) -  Session::get('final_price');

                                Session::put('CUPONPRICEDATA',$put_data_on_session);


                                @endphp

                                @endif
                        </div>


                        @else
                        <div class="cart-total-sm">

                            @if(Session::has('area_name'))
                            <span>Delivary Charge</span>
                            <span class="card-total-price">৳ {{ Session::get('ship_price') }} </span>
                            <span>Subtotal</span>
                            <span class="card-total-price">৳ {{ $total + Session::get('ship_price')  }} </span>
                            @else

                            <span>Subtotal</span>
                            <span class="card-total-price">৳ {{ $total}} </span>
                            @endif
                        </div>

                        @endif
                        <div class="clearfix mt-2">
                            <button type="submit" class="btn btn--lg w-100">Place Order</button>
                        </div>
                    </div>
                </div>
                <!--new card condition-->
@endif
@endif
                <!--new card condition-->
            </div>
        </div>

        @endif

</div>
</form>
@endsection


@section('scripts')

<script>
    $(document).ready(function () {
        //add customer
        $("#areaId").on('change', function () {
            var customerId = $(this).val();

            //alert(customerId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('area_select') }}",
                type: "POST",
                data: {
                    'customerId': customerId
                },
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
