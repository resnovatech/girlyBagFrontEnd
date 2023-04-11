@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection

@section('css')


@endsection

@section('body')
<!--image show code -->
<?php


use App\Http\Controllers\Admin\ProductController;


?>
<!--image show code -->

<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>Category</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="page-title text-center">
                <h1>All Section</h1>
            </div>
            <div class="filter-row">
                <div class="row">
                    <!--total item count-->
                    <!--<div class="items-count">35 item(s)</div>-->

                    @if(Session::has('brand_wise_product_list'))




                    <?php
                     $newwork = (Session::get('brand_wise_product_list'));
                     $emptyArrayCheck = array_filter( $newwork );


                     $newwork1 = (Session::get('child_des_name_list'));
                     $emptyArrayCheck1 = array_filter( $newwork1 );

                      ?>


                    @if($emptyArrayCheck == [] && $emptyArrayCheck1 == [])

                    <div class="items-count">{{ count($product_show_category_brand_wise) }} items</div>

                    @elseif($emptyArrayCheck == [])

                    <div class="items-count">{{ count($product_show_category_brand_wise)}} items</div>

                    @elseif($emptyArrayCheck1 == [])

                    <div class="items-count">{{ count($product_show_category_brand_wise)}} items</div>
                    @else

                    <div class="items-count">{{ count($product_show_category_brand_wise)}} items</div>
                    @endif








                    @else
                    <div class="items-count">{{ count($product_show_category_brand_wise) }} items</div>
                    @endif

                    <!--total item count -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 overflow-auto aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop"
                    data-grid-tab-content>
                    <div class="filter-col-content filter-mobile-content ">
                        <div class="sidebar-block">
                            <div class="sidebar-block_title">
                                <span>Current selection</span>
                            </div>
                            <div class="sidebar-block_content">
                                <div class="selected-filters-wrap">
                                    <ul class="selected-filters">


                                        @if(Session::has('filter_category_name'))




                                        <li><a href="#">{{Session::get('filter_category_name')}}</a></li>


                                        @if(Session::has('brand_wise_product_list'))

                                        @if(Session::has('brand_id_list'))


                                        <?php
$brandArray = explode('-',Session::get('brand_id_list'));

//dd($brandArray );

?>
                                        @endif

                                        @foreach($brand_name as $new_name)


                                        @if(!empty($brandArray) && in_array($new_name->id,$brandArray))


                                        <li><a href="#">{{ $new_name->name }}</a></li>
                                        @endif

                                        @endforeach

                                        @else


                                        @endif



                                        @if(Session::has('child_des_name_list'))


                                        @if(Session::has('child_des_name'))


                                        <?php
$childArray = explode('-',Session::get('child_des_name'));

//dd($brandArray );

?>
                                        @endif






                                        @foreach($child_description_active_productchild_product_id as $new_name1)

                                        @if(!empty($childArray) && in_array($new_name1->description_child,$childArray))
                                        <li><a href="#">{{ $new_name1->description_child }}</a></li>
                                        @endif

                                        @endforeach





                                        @else


                                        @endif







                                        @else




                                        @foreach($category_wise_product_view as $newcat_front)

                                        <li><a href="#">All</a></li>

                                        @endforeach

                                        @if(Session::has('brand_wise_product_list'))


                                        @if(Session::has('brand_id_list'))


                                        <?php
$brandArray = explode('-',Session::get('brand_id_list'));

//dd($brandArray );

?>
                                        @endif






                                        @foreach($brand_name as $new_name)

                                        @if(!empty($brandArray) && in_array($new_name->id,$brandArray))
                                        <li><a href="#">{{ $new_name->name }}</a></li>
                                        @endif

                                        @endforeach





                                        @else


                                        @endif



                                        @if(Session::has('child_des_name_list'))


                                        @if(Session::has('child_des_name'))


                                        <?php
$childArray = explode('-',Session::get('child_des_name'));

//dd($brandArray );

?>
                                        @endif






                                        @foreach($child_description_active_productchild_product_id as $new_name1)

                                        @if(!empty($childArray) && in_array($new_name1->description_child,$childArray))
                                        <li><a href="#">{{ $new_name1->description_child }}</a></li>
                                        @endif

                                        @endforeach





                                        @else


                                        @endif




                                        <li><a href="#">{{Session::get('filter_category_brand_id')}}</a></li>








                                        @endif





                                    </ul>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <a href="{{ route('clear_all_data') }}" class="clear-filters"><span>Clear
                                                All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-block d-filter-mobile">
                            <!--<h3 class="mb-1">SORT BY</h3>
                            <div class="select-wrapper select-wrapper-xs">
                                <select class="form-control">
                                    <option value="featured">Featured</option>
                                    <option value="rating">Rating</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>-->
                        </div>
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>Categories</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">

                                    @if(Session::has('filter_category_name'))


                                    @foreach($category_wise_product_view_inactive1 as $newcat_front)





                                    <input type="checkbox" class="radioCheck" id="checkk{{ $newcat_front->id }}"
                                        data-mainid="{{ $newcat_front->category_slug }}" name="maincategory"
                                        value="{{ $newcat_front->category_slug }}" onclick="check(this);"
                                        {{ $newcat_front->category_name == Session::get('filter_category_name') ? 'checked':'' }}>



                <label for="checkk{{ $newcat_front->id }}">{{ $newcat_front->category_name }}</label><br>




                                    @endforeach

                                    @else



                                    @foreach($category_wise_product_view as $newcat_front)
                                    <!--<li><a href="#" title="" class="open">{{ $newcat_front->category_name }}</a></li>-->

                                    <input type="checkbox" class="radioCheck" id="checkk{{ $newcat_front->id }}"
                                        data-mainid="{{ $newcat_front->category_slug }}" name="maincategory"
                                        value="{{ $newcat_front->category_slug }}" onclick="check(this);" checked>
                                    <label
                                        for="checkk{{ $newcat_front->id }}">{{ $newcat_front->category_name }}</label><br>
                                    @endforeach

                                    @foreach($category_wise_product_view_inactive as $newcat_front)
                                    <!--<li><a href="#" title="" class="open">{{ $newcat_front->category_name }}</a></li>-->

                                    <input type="checkbox" class="radioCheck" id="checkk{{ $newcat_front->id }}"
                                        data-mainid="{{ $newcat_front->category_slug }}" name="maincategory"
                                        value="{{ $newcat_front->category_slug }}" onclick="check(this);">
                                    <label
                                        for="checkk{{ $newcat_front->id }}">{{ $newcat_front->category_name }}</label><br>
                                    @endforeach



                                    @endif
                                </ul>
                            </div>
                        </div>

                        <!--brand code -->


                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>Brands</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">

                                    <form action="{{ url('/products-filter') }}" method="post">
                                        @csrf

                                        <input type="hidden" name="url" value="{{ $url }}">


                                        @if(Session::has('filter_category_name'))

                                        @if(Session::has('brand_id_list'))


                                        <?php
$brandArray = explode('-',Session::get('brand_id_list'));

//dd($brandArray );

?>
                                        @endif


                                        @foreach($category_wise_brand_list_diaper as $newcat_front_brand1)

                                        <input type="checkbox" id="check{{ $newcat_front_brand1->id }}"
                                            name="maincategorybrand[]" value="{{ $newcat_front_brand1->id }}"
                                            onchange="javascript:this.form.submit();" @if(!empty($brandArray) &&
                                            in_array($newcat_front_brand1->id,$brandArray)) checked="" @endif>
                                        <label
                                            for="check{{ $newcat_front_brand1->id }}">{{ $newcat_front_brand1->name }}</label><br>
                                        @endforeach



                                        @else

                                        @if(Session::has('brand_id_list'))


                                        <?php
$brandArray = explode('-',Session::get('brand_id_list'));

//dd($brandArray );

?>
                                        @endif

                                        @foreach($category_wise_brand_list as $newcat_front_brand)


                                        <input type="checkbox" id="check{{ $newcat_front_brand->id }}"
                                            name="maincategorybrand[]" value="{{ $newcat_front_brand->id }}"
                                            onchange="javascript:this.form.submit();" @if(!empty($brandArray) &&
                                            in_array($newcat_front_brand->id,$brandArray)) checked="" @endif>
                                        <label
                                            for="check{{ $newcat_front_brand->id }}">{{ $newcat_front_brand->name }}</label><br>
                                        @endforeach



                                        @endif




                                </ul>
                            </div>
                        </div>

                        <!--brand code -->

                        @if(Session::has('child_des_name'))


                        <?php
                        $childArray = explode('-',Session::get('child_des_name'));

                        //dd($brandArray );

                        ?>
                        @endif
                        <!--category--wise--descriptionList-->
                        @if(Session::has('filter_category_name'))

                        <!-- child description code -->
                        @foreach($parent_description_active_product as $newtest)
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>{{ $newtest->description_category }}</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">






                                @foreach($child_description_active_product as $child_product)
                                @if($newtest->id == $child_product->parent_id)




                                <input type="checkbox" id="checkchild{{ $child_product->id }}" name="child_desw[]"
                                    value="{{ $child_product->description_child }}"
                                    onchange="javascript:this.form.submit();" @if(!empty($childArray) &&
                                    in_array($child_product->description_child,$childArray)) checked="" @endif>



                                <label
                                    for="checkchild{{ $child_product->id }}">{{ $child_product->description_child }}</label><br>



                                @endif
                                @endforeach













                            </div>
                        </div>
                        @endforeach


                        @else

                        {{-- <!-- child description code -->
                        @foreach($parent_description_active_product as $newtest)
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>{{ $newtest->description_category }}</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">






                                @foreach($child_description_active_product as $child_product)
                                @if($newtest->id == $child_product->parent_id)




                                <input type="checkbox" id="checkchild{{ $child_product->id }}" name="child_desw[]"
                                    value="{{ $child_product->description_child }}"
                                    onchange="javascript:this.form.submit();" @if(!empty($childArray) &&
                                    in_array($child_product->description_child,$childArray)) checked="" @endif>



                                <label
                                    for="checkchild{{ $child_product->id }}">{{ $child_product->description_child }}</label><br>



                                @endif
                                @endforeach













                            </div>
                        </div>
                        @endforeach --}}

                        @endif


                        <!--category--wise--descriptionlist-->

                        <!-- chil description code -->
                        <!--<div class="sidebar-block filter-group-block collapsed">
                            <div class="d-flex flex-wrap align-items-center">
                                <a href="#" class="btn btn-primary mt-4"><span>Filter</span></a>
                            </div>
                        </div>-->
                    </div>
                </div>
                </form>
                <div class="filter-toggle js-filter-toggle">
                    <div class="loader-horizontal js-loader-horizontal">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%">
                            </div>
                        </div>
                    </div>
                    <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i
                            class="icon-filter-close"></i></span>
                    <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">REFINE &
                            SORT</a><a href="#" class="filter-btn-close js-filter-btn">RESET</a><a href="#"
                            class="filter-btn-apply js-filter-btn">APPLY & CLOSE</a></span>
                </div>
                <div class="col-lg aside">
                    <div class="prd-grid-wrap scrollpage">
                        <div class="prd-grid product-listing data-to-show-3
                        data-to-show-lg-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid "
                            data-grid-tab-content >



                            <!--filter code-->
                            @if(Session::has('brand_wise_product_list'))




                            <?php
                       $newwork = (Session::get('brand_wise_product_list'));
                       $emptyArrayCheck = array_filter( $newwork );


                       $newwork1 = (Session::get('child_des_name_list'));
                       $emptyArrayCheck1 = array_filter( $newwork1 );

                        ?>


                            @if($emptyArrayCheck == [] && $emptyArrayCheck1 == [])
                            @if(count($product_show_category_brand_wise) == 0 )
                            <div class="page404-bg">
                                <div class="page404-text">
                                    <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                    <div class="txt4">Unfortunately, there are no products<br>matching the selection
                                    </div>
                                </div>
                                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600"
                                    height="600" viewBox="0 0 600 600">
                                    <g transform="translate(50,50)">
                                        <path class="p"
                                            d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                                    </g>
                                </svg>
                            </div>
                            @else

                             <!--product will show here-->

                             @foreach($product_show_category_brand_wise as $result)
                             <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                 <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="{{route('product_single_view',$result->product_slug)}}" class="prd-img image-hover-scale image-container"
                  style="padding-bottom: 128.48%"><img data-src="{{asset('/')}}{{'public/upload/'.$result->sh}}"
                  class="js-prd-img lazyload fade-up"></a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a class="circle-label-qview  prd-hide-mobile view-product"
                                            onclick="quickView({{ $result->id }})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>

                                    </div>

                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-tag"><a href="#">Brand NAme</a></div>
                                            <h2 class="prd-title"><a href="{{route('product_single_view',$result->product_slug)}}">
                                             {{ $result->product_name }}</a></h2>

                                             <div class="prd-action product_data1">


                                                    <input type="hidden" class="product_id1" value="{{ $result->id }}" name="id">
                                                    <input type="hidden" class="qty-input1" value="1">

                                                    <button class="btn ">
                                                     Add To Cart
                                                 </button>

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
                         <div class="prd-hide-mobile"><a href="#"
                             class="circle-label-qview view-product"
                             data-productid="{{$result->id}}"><i
                             class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                         </div>
                         <div class="prd-price">
                             <!--<div class="price-old">$ {{$result->discount_amount}}</div>-->
                             <div class="price-new">৳ {{ $result->sell_price }}</div>
                         </div>
                         <div class="prd-action">
                             <div class="prd-action-left product_data">
                                <input type="hidden" class="qty-input" value="1">

                                <input type="hidden" value="{{ $result->id }}" class="product_id"  name="id">


                        <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"
                        data-product-id="{{ $result->id }}"
                       data-product='{"name:" "{{ $result->product_name }}", "path:"
                            "{{asset('/')}}{{'public/upload/'.$result->sh}}", "url:""{{ url('/cart') }}", "aspect_ratio":0.778}' >
                                                           Add To Cart
                                                       </button>


                         </div>
                     </div>
                 </div>
                                    </div>
                                 </div>
                               </div>


@endforeach
                         <!--product will show here-->

                         {{ $product_show_category_brand_wise->links() }}
                            @endif
                            @elseif($emptyArrayCheck == [])

                            @if(count($product_show_category_brand_wise) == 0 )
                            <div class="page404-bg">
                                <div class="page404-text">
                                    <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                    <div class="txt4">Unfortunately, there are no products<br>matching the selection
                                    </div>
                                </div>
                                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600"
                                    height="600" viewBox="0 0 600 600">
                                    <g transform="translate(50,50)">
                                        <path class="p"
                                            d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                                    </g>
                                </svg>
                            </div>
                            @else

                             <!--product will show here-->

                             @foreach($product_show_category_brand_wise as $result)
                             <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                 <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="{{route('product_single_view',$result->product_slug)}}" class="prd-img image-hover-scale image-container"
                  style="padding-bottom: 128.48%"><img data-src="{{asset('/')}}{{'public/upload/'.$result->sh}}"
                  class="js-prd-img lazyload fade-up"></a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a class="circle-label-qview  prd-hide-mobile view-product"
                                            onclick="quickView({{ $result->id }})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>

                                    </div>

                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-tag"><a href="#">Brand NAme</a></div>
                                            <h2 class="prd-title"><a href="{{route('product_single_view',$result->product_slug)}}">
                                             {{ $result->product_name }}</a></h2>

                                             <div class="prd-action product_data1">


                                                    <input type="hidden" class="product_id1" value="{{ $result->id }}" name="id">
                                                    <input type="hidden" class="qty-input1" value="1">

                                                    <button class="btn ">
                                                     Add To Cart
                                                 </button>

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
                         <div class="prd-hide-mobile"><a href="#"
                             class="circle-label-qview view-product"
                             data-productid="{{$result->id}}"><i
                             class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                         </div>
                         <div class="prd-price">
                             <!--<div class="price-old">$ {{$result->discount_amount}}</div>-->
                             <div class="price-new">৳ {{ $result->sell_price }}</div>
                         </div>
                         <div class="prd-action">
                             <div class="prd-action-left product_data">
                                <input type="hidden" class="qty-input" value="1">

                                <input type="hidden" value="{{ $result->id }}" class="product_id"  name="id">


                        <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"
                        data-product-id="{{ $result->id }}"
                       data-product='{"name:" "{{ $result->product_name }}", "path:"
                            "{{asset('/')}}{{'public/upload/'.$result->sh}}", "url:""{{ url('/cart') }}", "aspect_ratio":0.778}' >
                                                           Add To Cart
                                                       </button>


                         </div>
                     </div>
                 </div>
                                    </div>
                                 </div>
                               </div>


@endforeach
                         <!--product will show here-->

                         {{ $product_show_category_brand_wise->links() }}
                            @endif


                            @elseif($emptyArrayCheck1 == [])
                            @if(count($product_show_category_brand_wise) == 0 )
                            <div class="page404-bg">
                                <div class="page404-text">
                                    <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                    <div class="txt4">Unfortunately, there are no products<br>matching the selection
                                    </div>
                                </div>
                                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600"
                                    height="600" viewBox="0 0 600 600">
                                    <g transform="translate(50,50)">
                                        <path class="p"
                                            d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                                    </g>
                                </svg>
                            </div>
                            @else

                             <!--product will show here-->

                             @foreach($product_show_category_brand_wise as $result)
                             <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                 <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="{{route('product_single_view',$result->product_slug)}}" class="prd-img image-hover-scale image-container"
                  style="padding-bottom: 128.48%"><img data-src="{{asset('/')}}{{'public/upload/'.$result->sh}}"
                  class="js-prd-img lazyload fade-up"></a>
                                        <div class="prd-circle-labels">
                                            <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                            <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                            <a class="circle-label-qview  prd-hide-mobile view-product"
                                            onclick="quickView({{ $result->id }})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>

                                    </div>

                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-tag"><a href="#">Brand NAme</a></div>
                                            <h2 class="prd-title"><a href="{{route('product_single_view',$result->product_slug)}}">
                                             {{ $result->product_name }}</a></h2>

                                             <div class="prd-action product_data1">


                                                    <input type="hidden" class="product_id1" value="{{ $result->id }}" name="id">
                                                    <input type="hidden" class="qty-input1" value="1">

                                                    <button class="btn ">
                                                     Add To Cart
                                                 </button>

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
                         <div class="prd-hide-mobile"><a href="#"
                             class="circle-label-qview view-product"
                             data-productid="{{$result->id}}"><i
                             class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                         </div>
                         <div class="prd-price">
                             <!--<div class="price-old">$ {{$result->discount_amount}}</div>-->
                             <div class="price-new">৳ {{ $result->sell_price }}</div>
                         </div>
                         <div class="prd-action">
                             <div class="prd-action-left product_data">
                                <input type="hidden" class="qty-input" value="1">

                                <input type="hidden" value="{{ $result->id }}" class="product_id"  name="id">


                        <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"
                        data-product-id="{{ $result->id }}"
                       data-product='{"name:" "{{ $result->product_name }}", "path:"
                            "{{asset('/')}}{{'public/upload/'.$result->sh}}", "url:""{{ url('/cart') }}", "aspect_ratio":0.778}' >
                                                           Add To Cart
                                                       </button>


                         </div>
                     </div>
                 </div>
                                    </div>
                                 </div>
                               </div>


@endforeach
                         <!--product will show here-->

                         {{ $product_show_category_brand_wise->links() }}
                            @endif

                            @else

                            @if(count($product_show_category_brand_wise) == 0 )
                            <div class="page404-bg">
                                <div class="page404-text">
                                    <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                    <div class="txt4">Unfortunately, there are no products<br>matching the selection
                                    </div>
                                </div>
                                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600"
                                    height="600" viewBox="0 0 600 600">
                                    <g transform="translate(50,50)">
                                        <path class="p"
                                            d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                                    </g>
                                </svg>
                            </div>
                            @else

                              <!--product will show here-->

                              @foreach($product_show_category_brand_wise as $result)
                              <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                  <div class="prd-inside">
                                     <div class="prd-img-area">
                                         <a href="{{route('product_single_view',$result->product_slug)}}" class="prd-img image-hover-scale image-container"
                   style="padding-bottom: 128.48%"><img data-src="{{asset('/')}}{{'public/upload/'.$result->sh}}"
                   class="js-prd-img lazyload fade-up"></a>
                                         <div class="prd-circle-labels">
                                             <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                             <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                             <a class="circle-label-qview  prd-hide-mobile view-product"
                                             onclick="quickView({{ $result->id }})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                         </div>

                                     </div>

                                     <div class="prd-info">
                                         <div class="prd-info-wrap">
                                             <div class="prd-tag"><a href="#">Brand NAme</a></div>
                                             <h2 class="prd-title"><a href="{{route('product_single_view',$result->product_slug)}}">
                                              {{ $result->product_name }}</a></h2>

                                              <div class="prd-action product_data1">


                                                     <input type="hidden" class="product_id1" value="{{ $result->id }}" name="id">
                                                     <input type="hidden" class="qty-input1" value="1">

                                                     <button class="btn ">
                                                      Add To Cart
                                                  </button>

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
                          <div class="prd-hide-mobile"><a href="#"
                              class="circle-label-qview view-product"
                              data-productid="{{$result->id}}"><i
                              class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                          </div>
                          <div class="prd-price">
                              <!--<div class="price-old">$ {{$result->discount_amount}}</div>-->
                              <div class="price-new">৳ {{ $result->sell_price }}</div>
                          </div>
                          <div class="prd-action">
                              <div class="prd-action-left product_data">
                                 <input type="hidden" class="qty-input" value="1">

                                 <input type="hidden" value="{{ $result->id }}" class="product_id"  name="id">


                         <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"
                         data-product-id="{{ $result->id }}"
                        data-product='{"name:" "{{ $result->product_name }}", "path:"
                             "{{asset('/')}}{{'public/upload/'.$result->sh}}", "url:""{{ url('/cart') }}", "aspect_ratio":0.778}' >
                                                            Add To Cart
                                                        </button>


                          </div>
                      </div>
                  </div>
                                     </div>
                                  </div>
                                </div>


@endforeach
                          <!--product will show here-->

                          {{ $product_show_category_brand_wise->links() }}

                            @endif

                            @endif




                            @else



                            <!--normal product-->

                            <?php

$brand_wise_product_list=Session::get('brand_wise_product_list');
$child_des_name = Session::get('child_des_name_list');


?>

                            @if(empty($child_des_name) && empty($brand_wise_product_list))

                            <!--empty check-->

                            @if(count($product_show_category_brand_wise) == 0 )
                            <div class="page404-bg">
                                <div class="page404-text">
                                    <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                    <div class="txt4">Unfortunately, there are no products<br>matching the selection
                                    </div>
                                </div>
                                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600"
                                    height="600" viewBox="0 0 600 600">
                                    <g transform="translate(50,50)">
                                        <path class="p"
                                            d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                                    </g>
                                </svg>
                            </div>
                            @else
                            <!--ss-->
                            <!--empty check -->


                            <!--product will show here-->

                            @foreach($product_show_category_brand_wise as $result)
                                <div class="prd prd--style2 prd-labels--max prd-labels-shadow prd-w-lg">
                                    <div class="prd-inside">
                                       <div class="prd-img-area">
                                           <a href="{{route('product_single_view',$result->product_slug)}}" class="prd-img image-hover-scale image-container"
                     style="padding-bottom: 128.48%"><img data-src="{{asset('/')}}{{'public/upload/'.$result->sh}}"
                     class="js-prd-img lazyload fade-up"></a>
                                           <div class="prd-circle-labels">
                                               <a href="#" class="circle-label-compare circle-label-wishlist--add js-add-wishlist mt-0" title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>
                                               <a href="#" class="circle-label-compare circle-label-wishlist--off js-remove-wishlist mt-0" title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>
                                               <a class="circle-label-qview  prd-hide-mobile view-product"
                                               onclick="quickView({{ $result->id }})"><i class="icon-eye"></i><span>QUICK VIEW</span></a>
                                           </div>

                                       </div>

                                       <div class="prd-info">
                                           <div class="prd-info-wrap">
                                               <div class="prd-tag"><a href="#">Brand NAme</a></div>
                                               <h2 class="prd-title"><a href="{{route('product_single_view',$result->product_slug)}}">
                                                {{ $result->product_name }}</a></h2>

                                                <div class="prd-action product_data1">


                                                       <input type="hidden" class="product_id1" value="{{ $result->id }}" name="id">
                                                       <input type="hidden" class="qty-input1" value="1">

                                                       <button class="btn ">
                                                        Add To Cart
                                                    </button>

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
                            <div class="prd-hide-mobile"><a href="#"
                                class="circle-label-qview view-product"
                                data-productid="{{$result->id}}"><i
                                class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                            </div>
                            <div class="prd-price">
                                <!--<div class="price-old">$ {{$result->discount_amount}}</div>-->
                                <div class="price-new">৳ {{ $result->sell_price }}</div>
                            </div>
                            <div class="prd-action">
                                <div class="prd-action-left product_data">
                                   <input type="hidden" class="qty-input" value="1">

                                   <input type="hidden" value="{{ $result->id }}" class="product_id"  name="id">


                           <button id="footer_cart" class="btn add-to-cart-btn js-prd-addtocart"
                           data-product-id="{{ $result->id }}"
                          data-product='{"name:" "{{ $result->product_name }}", "path:"
                               "{{asset('/')}}{{'public/upload/'.$result->sh}}", "url:""{{ url('/cart') }}", "aspect_ratio":0.778}' >
                                                              Add To Cart
                                                          </button>


                            </div>
                        </div>
                    </div>
                                       </div>
                                    </div>
                                  </div>


@endforeach
                            <!--product will show here-->

                            {{ $product_show_category_brand_wise->links() }}

                            @endif

                            @else
                            @if(count($random_product_list) == 0 )
                            <div class="page404-bg">
                                <div class="page404-text">
                                    <div class="txt3"><i class="icon-shopping-bag"></i></div>
                                    <div class="txt4">Unfortunately, there are no products<br>matching the selection
                                    </div>
                                </div>
                                <svg class="blob" id="morphing" xmlns="http://www.w3.org/2000/svg" width="600"
                                    height="600" viewBox="0 0 600 600">
                                    <g transform="translate(50,50)">
                                        <path class="p"
                                            d="M93.5441 2.30824C127.414 -1.02781 167.142 -4.63212 188.625 21.7114C210.22 48.1931 199.088 86.5178 188.761 119.068C179.736 147.517 162.617 171.844 136.426 186.243C108.079 201.828 73.804 212.713 44.915 198.152C16.4428 183.802 6.66731 149.747 1.64848 118.312C-2.87856 89.9563 1.56309 60.9032 19.4066 38.3787C37.3451 15.7342 64.7587 5.14348 93.5441 2.30824Z" />
                                    </g>
                                </svg>
                            </div>
                            @else

                            @endif
                            @endif

                            @endif

                            <!--filter code-->



                        </div>
                          <!-- Data Loader -->
        <div class="auto-load text-center">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
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


<!-- Modal -->
<div class="modal fade productModal1 " style="margin-top: 5%;" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3 modal-data1">


        </div>
    </div>
</div>


@endsection
@section('scripts')
<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrollpage').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrollpage',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>





<script>
    function check(input) {

        var checkboxes = document.getElementsByClassName("radioCheck");

        for (var i = 0; i < checkboxes.length; i++) {
            //uncheck all
            if (checkboxes[i].checked == true) {
                checkboxes[i].checked = false;
            }
        }

        //set checked of clicked object
        if (input.checked == true) {
            input.checked = false;
        } else {
            input.checked = true;
        }
    }
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

            });

            //end ajax
        });


        //edit product
        $(".view-product1").click(function () {
            var productid1 = $(this).data('productid1');
            //ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('single_category1')}}",
                type: "POST",
                data: {
                    'productid1': productid1
                },
                //dataType:'json',
                success: function (data) {
                    $(".modal-data1").html(data);
                    $('.productModal1').modal('show');
                },

            });

            //end ajax
        });

        //main-category add function

        $('input[id^="checkk"]').on('change', function () {
            var customerId = $(this).val();

            //alert(customerId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('filter_view')}}",
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
            //  //endajax
        });







    });

</script>
<script>
    function addCart(product_id) {

        //alert(product_id);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = product_id;
        var quantity = 1;

        //alert(quantity);

        $.ajax({
            url: "{{ route('cart.store') }}",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
            },
            success: function (response) {
                alertify.set('notifier', 'position', 'top-center');
                alertify.success(response.status);

                $("#footer_cart1").show();
                cartload();
                cartloadalldata();
                //alert("success");
            },
        });


    }

    function quickView(product_id) {

        //alert(product_id);


        var productid = product_id;
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
          
        });
    }

</script>

@endsection
