@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection




@section('body')

<?php


use App\Http\Controllers\Admin\ProductController;


?>

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
                    <div class="items-count">{{ count($random_product_list) }} items</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 overflow-auto aside aside--left filter-col filter-mobile-col filter-col--sticky js-filter-col filter-col--opened-desktop" data-grid-tab-content>
                    <div class="filter-col-content filter-mobile-content ">
                        <div class="sidebar-block">
                            <div class="sidebar-block_title">
                                <span>Current selection</span>
                            </div>
                            <div class="sidebar-block_content">
                                <div class="selected-filters-wrap">
                                    <ul class="selected-filters">
                                        @foreach($category_wise_product_view as $newcat_front)
                                        <li><a href="#">{{ $newcat_front->category_name }}</a></li>

                                        @endforeach
                                    </ul>
                                    <div class="d-flex flex-wrap align-items-center">
                                        <a href="#" class="clear-filters"><span>Clear All</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-block d-filter-mobile">
                            <h3 class="mb-1">SORT BY</h3>
                            <div class="select-wrapper select-wrapper-xs">
                                <select class="form-control">
                                    <option value="featured">Featured</option>
                                    <option value="rating">Rating</option>
                                    <option value="price">Price</option>
                                </select>
                            </div>
                        </div>
                        <div class="sidebar-block filter-group-block open">
                            <div class="sidebar-block_title">
                                <span>Categories</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <ul class="category-list">
                                   @foreach($category_wise_product_view as $newcat_front)
                                    <!--<li><a href="#" title="" class="open">{{ $newcat_front->category_name }}</a></li>-->

                                    <input type="checkbox" class="radioCheck" id="checkk{{ $newcat_front->id }}" data-mainid="{{ $newcat_front->category_slug }}" name="maincategory"
                                    value="{{ $newcat_front->category_slug }}" onclick="check(this);" checked>
                                    <label for="checkk{{ $newcat_front->id }}">{{ $newcat_front->category_name }}</label><br>
                                    @endforeach

                                    @foreach($category_wise_product_view_inactive as $newcat_front)
                                    <!--<li><a href="#" title="" class="open">{{ $newcat_front->category_name }}</a></li>-->

                                    <input type="checkbox" class="radioCheck" id="checkk{{ $newcat_front->id }}" data-mainid="{{ $newcat_front->category_slug }}" name="maincategory"
                                    value="{{ $newcat_front->category_slug }}" onclick="check(this);">
                                    <label for="checkk{{ $newcat_front->id }}">{{ $newcat_front->category_name }}</label><br>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                        @foreach($parent_description_active_product as $newtest)
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="sidebar-block_title">
                                <span>{{ $newtest->description_category }}</span>
                                <span class="toggle-arrow"><span></span><span></span></span>
                            </div>
                            <div class="sidebar-block_content">
                                <form action="">
                                    @foreach($child_description_active_product as $child_product)
                                    @if($newtest->id  == $child_product->parent_id)
                                    <input type="checkbox"  id="check{{ $child_product->id }}" name="child_des" value="{{ $child_product->description_child }}">
                                    <label for="check{{ $child_product->id }}">{{ $child_product->description_child }}</label><br>
                                    @endif
                                  @endforeach
                                </form>
                            </div>
                        </div>
@endforeach
                        <div class="sidebar-block filter-group-block collapsed">
                            <div class="d-flex flex-wrap align-items-center">
                                <a href="#" class="btn btn-primary mt-4"><span>Filter</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-toggle js-filter-toggle">
                    <div class="loader-horizontal js-loader-horizontal">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                        </div>
                    </div>
                    <span class="filter-toggle-icons js-filter-btn"><i class="icon-filter"></i><i class="icon-filter-close"></i></span>
                    <span class="filter-toggle-text"><a href="#" class="filter-btn-open js-filter-btn">REFINE & SORT</a><a href="#" class="filter-btn-close js-filter-btn">RESET</a><a href="#" class="filter-btn-apply js-filter-btn">APPLY & CLOSE</a></span>
                </div>
                <div class="col-lg aside">
                    <div class="prd-grid-wrap">
                        <div class="prd-grid product-listing data-to-show-3 data-to-show-md-3 data-to-show-sm-2 js-category-grid" data-grid-tab-content>

                            @foreach($random_product_list as $newRandom_list)
                            <?php
                            $stock=ProductController::stock($newRandom_list->id);
                            ?>
                            <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                                <div class="prd-inside">
                                    <div class="prd-img-area">
                                        <a href="{{route('product_single_view',$newRandom_list->product_slug)}}" class="prd-img image-hover-scale image-container"
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
                                            <a href="#" class="circle-label-qview view-product prd-hide-mobile"
                                            data-productid="{{$newRandom_list->id}}"><i
                                                        class="icon-eye"></i><span>QUICK VIEW</span></a>
                                        </div>
                                    </div>
                                    <div class="prd-info">
                                        <div class="prd-info-wrap">
                                            <div class="prd-tag"><a href="#">Banita</a></div>
                                            <h2 class="prd-title"><a href="{{route('product_single_view',$newRandom_list->product_slug)}}">{{$newRandom_list->product_name}}</a></h2>

                                            <div class="prd-action">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $newRandom_list->reward_point_product_count }}"
                                                    id="reward_point_product_count" name="reward_point_product_count">
                                                    <input type="hidden" value="{{ $newRandom_list->id }}" id="id" name="id">
              <input type="hidden" value="{{ $newRandom_list->product_name }}" id="name" name="name">
              <input type="hidden" value="{{ $newRandom_list->sell_price }}" id="price" name="price">
              <input type="hidden" value="{{ $stock}}" id="img" name="img">
              <input type="hidden" id="quantity" name="quantity"  value="1" >
              <input type="hidden" value="{{ $newRandom_list->product_slug }}" id="product_slug" name="product_slug">
                                                    <button class="btn">
                                                        Add To Cart
                                                    </button>
                                                </form>
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
                                                                                data-productid="{{$newRandom_list->id}}"><i
                                                                class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                            </div>
                                            <div class="prd-price">
                                                <div class="price-old">$ {{$newRandom_list->discount_amount}}</div>
                                                <div class="price-new">$ {{$newRandom_list->sell_price}}</div>
                                            </div>
                                            <div class="prd-action">
                                                <div class="prd-action-left">
                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $newRandom_list->reward_point_product_count }}"
                                                    id="reward_point_product_count" name="reward_point_product_count">
                                                        <input type="hidden" value="{{ $newRandom_list->id }}" id="id" name="id">
                  <input type="hidden" value="{{ $newRandom_list->product_name }}" id="name" name="name">
                  <input type="hidden" value="{{ $newRandom_list->sell_price }}" id="price" name="price">
                  <input type="hidden" value="{{ $stock}}" id="img" name="img">
                  <input type="hidden" id="quantity" name="quantity"  value="1" >
                  <input type="hidden" value="{{ $newRandom_list->product_slug }}" id="product_slug" name="product_slug">
                                                        <button class="btn">
                                                            Add To Cart
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          @endforeach

                        </div>
                        <div class="loader-horizontal-sm js-loader-horizontal-sm d-none" data-loader-horizontal style="opacity: 0;"><span></span></div>
                    </div>
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
                 data-slick='{"slidesToShow": 4, "slidesToScroll": 2,
                 "responsive": [{"breakpoint": 992,"settings": {"slidesToShow": 3, "slidesToScroll": 1}},
                 {"breakpoint": 768,"settings": {"slidesToShow": 2, "slidesToScroll": 1}},{"breakpoint": 480,"settings": {"slidesToShow": 2, "slidesToScroll": 1}}]}'>
                 @foreach($randomOder_list as $popular_list)
                 <?php
                 $stock=ProductController::stock($popular_list->id);
                 ?>
                <div class="prd prd--style2 prd-labels--max prd-labels-shadow ">
                    <div class="prd-inside">
                        <div class="prd-img-area">
                            <a href="{{route('product_single_view',$popular_list->product_slug)}}" class="prd-img image-hover-scale image-container"
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
                                <a href="#" class="circle-label-qview view-product prd-hide-mobile"
                                data-productid="{{$popular_list->id}}"><i
                                            class="icon-eye"></i><span>QUICK VIEW</span></a>
                            </div>
                        </div>
                        <div class="prd-info">
                            <div class="prd-info-wrap">
                                <div class="prd-tag"><a href="#">Banita</a></div>
                                <h2 class="prd-title"><a href="{{route('product_single_view',$popular_list->product_slug)}}">Oversized Cotton Blouse</a></h2>

                                <div class="prd-action">
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $popular_list->reward_point_product_count }}"
                                        id="reward_point_product_count" name="reward_point_product_count">
                                        <input type="hidden" value="{{ $popular_list->id }}" id="id" name="id">
  <input type="hidden" value="{{ $popular_list->product_name }}" id="name" name="name">
  <input type="hidden" value="{{ $popular_list->sell_price }}" id="price" name="price">
  <input type="hidden" value="{{ $stock}}" id="img" name="img">
  <input type="hidden" id="quantity" name="quantity"  value="1" >
  <input type="hidden" value="{{ $popular_list->product_slug }}" id="product_slug" name="product_slug">
                                        <button class="btn">
                                            Add To Cart
                                        </button>
                                    </form>
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
                                                                    data-productid="{{$popular_list->id}}"><i
                                                    class="icon-eye"></i><span>QUICK VIEW</span></a></div>
                                </div>
                                <div class="prd-price">
                                    <div class="price-old">$ {{$popular_list->discount_amount}}</div>
                                    <div class="price-new">$ {{$popular_list->sell_price}}</div>
                                </div>
                                <div class="prd-action">
                                    <div class="prd-action-left">
                                        <form action="{{ route('cart.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $popular_list->reward_point_product_count }}"
                                            id="reward_point_product_count" name="reward_point_product_count">
                                            <input type="hidden" value="{{ $popular_list->id }}" id="id" name="id">
      <input type="hidden" value="{{ $popular_list->product_name }}" id="name" name="name">
      <input type="hidden" value="{{ $popular_list->sell_price }}" id="price" name="price">
      <input type="hidden" value="{{ $stock}}" id="img" name="img">
      <input type="hidden" id="quantity" name="quantity"  value="1" >
      <input type="hidden" value="{{ $popular_list->product_slug }}" id="product_slug" name="product_slug">
                                            <button class="btn">
                                                Add To Cart
                                            </button>
                                        </form>
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
  <div class="modal fade bd-example-modal-lg productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content p-3 modal-data">

      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
       function check(input)
    {

    	var checkboxes = document.getElementsByClassName("radioCheck");

    	for(var i = 0; i < checkboxes.length; i++)
    	{
    		//uncheck all
    		if(checkboxes[i].checked == true)
    		{
    			checkboxes[i].checked = false;
    		}
    	}

    	//set checked of clicked object
    	if(input.checked == true)
    	{
    		input.checked = false;
    	}
    	else
    	{
    		input.checked = true;
    	}
    }
    $(document).ready(function(){
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

//main-category add function

       $('input[id^="checkk"]').on('change',function(){
	var customerId=$(this).val();

    //alert(customerId);
	 $.ajax({
	 	headers: {
	 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	 	},
	 	url:"{{route('filter_view')}}",
	 	type:"POST",
	 	data:{'customerId':customerId},
         //dataType:'json',
         success:function(data){


         	if(data==1){
         		location.reload(true);
         	}else{
         		alert('Something Went wrong Please Try Again.');
         	}

        },
        error:function(){
         	alert("error ase");
        }
     });
    //  //endajax
 });


        });

       </script>


       @endsection
