
       <div class="modal-body">
        <div class="prd-block prd-block--prv-bottom" id="">
            <div class="row no-gutters">
                <div class="col-lg-9 " >
                    <img src="{{asset('/')}}{{'public/upload/'.$secondImage}}" alt="">

                </div>
                <div class="col-lg-9 quickview-info pt-4 pb-4">
                    <div class="prd-block_info prd-block_info--style2">
                        <div class="prd-block_title-wrap">
                            <h1 class="prd-block_title">{{ $products_new->product_name }}</h1>
                        </div>
                        <div class="prd-block_price">
                            <div class="prd-block_price--actual">৳ {{ $products_new->sell_price }}</div>

                        </div>
                        <div class="prd-block_description prd-block_info_item">
                            <p>{!! $products_new->sh !!}</p>
                            <!--<div class="mt-1"></div>
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
                        <div class="prd-block_options">

                        </div>

                        <div class="prd-block_actions prd-block_actions--wishlist">
                            <div class="prd-block_qty">
                                <div class="qty qty-changer product_data">
                                    <button class="decrease " onclick="reduceValue()"></button>
                                    <input type="number" class="qty-input" id="number" name="quantity" value="1" data-min="1"
                                           data-max="1000">
                                           <input type="hidden" class="product_id_single" value="{{ $products_new->id }}" id="id1" name="id">


                                    <button class="increase " onclick="increaseValue()"></button>
                                </div>
                            </div>
                            <div class="btn-wrap">






<button class="btn btn--add-to-cart js-prd-addtocart add-to-cart-btn" id="submit-data" data-product='{"name":"{{ $products_new->product_name }}", "url": "{{ url('/cart') }}", "path":
    "{{asset('/')}}{{'public/upload/'.$secondImage}}", "aspect_ratio ": "0.78"}'>
                                    Add to cart
                                </button>
                                <!--</form>--->
                            </div>
                            <div class="btn-wishlist-wrap">
                                <!--<a href="#" class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--add js-add-wishlist"
                                   title="Add To Wishlist"><i class="icon-heart-stroke"></i></a>-->
                                <!--<a href="#"
                                   class="btn-add-to-wishlist ml-auto btn-add-to-wishlist--off js-remove-wishlist"
                                   title="Remove From Wishlist"><i class="icon-heart-hover"></i></a>-->
                            </div>
                        </div>
                        <div class="prd-block_shopping-info-wrap-compact">
                            <div class="prd-block_shopping-info-compact"><i
                                        class="icon-delivery-truck"></i><span>Fast<br>Shipping</span></div>
                            <div class="prd-block_shopping-info-compact"><i class="icon-return"></i><span>Easy<br>Return</span>
                            </div>
                            <div class="prd-block_shopping-info-compact"><i class="icon-call-center"></i><span>24/7<br>Support</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="{{route('product_single_view',$products_new->product_slug)}}" class="btn btn-primary">View Full Info</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>


    <script>


        $(document).ready(function () {
           cartload();
       });

      function cartload()
      {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url: "{{ route('cartloadbyajax') }}",
              method: "GET",
              success: function (response) {
                  $('.basket-item-count').html('');
                  var parsed = jQuery.parseJSON(response)
                  var value = parsed; //Single Data Viewing
                  $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
              }
          });
      }




    $(document).ready(function () {
          $('.add-to-cart-btn').click(function (e) {
              e.preventDefault();

              //alert('i am here');

               $.ajaxSetup({
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });

               var product_id = $("#id1").val();
               var quantity = $("#number").val();

               //alert(quantity);

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

          //all data clear

          $('.clear_cart').click(function (e) {
              e.preventDefault();

              $.ajax({
                  url: "{{ route('clearcart') }}",
                  type: "GET",
                  success: function (response) {
                      window.location.reload();
                      alertify.set('notifier','position','top-right');
                      alertify.success(response.status);
                  }
              });

          });

          //quantity increment button

          $('.increment-btn').click(function (e) {
                e.preventDefault();
                var incre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(incre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value<10){
                    value++;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });

          //quantity decrement button


          $('.decrement-btn').click(function (e) {
                e.preventDefault();
                var decre_value = $(this).parents('.quantity').find('.qty-input').val();
                var value = parseInt(decre_value, 10);
                value = isNaN(value) ? 0 : value;
                if(value>1){
                    value--;
                    $(this).parents('.quantity').find('.qty-input').val(value);
                }
            });


            //update quantity


            $('.changeQuantity').click(function (e) {
                e.preventDefault();

                var thisClick = $(this);

                var quantity = $(this).closest(".cartpage").find('.qty-input').val();
                var product_id = $(this).closest(".cartpage").find('.product_id').val();

                var data = {
                    '_token': $('input[name=_token]').val(),
                    'quantity':quantity,
                    'product_id':product_id,
                };

                $.ajax({
                    url: "{{ route('updatetocart') }}",
                    type: "POST",
                    data: data,
                    success: function (response) {
                        //window.location.reload();
                        //console.log(response.gtprice);
                        thisClick.closest(".newtest").find('.cart-table-prd-price-total').text(response.gtprice);
                        $('#totalajaxcall').load(location.href +' .totalpricingload');
                        alertify.set('notifier','position','top-center');
                        alertify.success(response.status);
                    }
                });
            });


            //single product delete from cart


            $('.delete_cart_data').click(function (e) {
                e.preventDefault();

    //alert("i am here");
                  var thisDeletearea = $(this);
                 var product_id = $(this).closest(".removediv").find('.p_id').val();


                 //dd('')

                 //alert(product_id);

                var data = {
                    '_token': $('input[name=_token]').val(),
                    "product_id": product_id,
                };

                // $(this).closest(".cartpage").remove();

                $.ajax({
                    url: "{{ route('deletefromcart') }}",
                    type: "DELETE",
                    data: data,
                    success: function (response) {
                        //window.location.reload();

                       thisDeletearea.closest(".removediv").remove();
                       $('#totalajaxcall').load(location.href +' .totalpricingload');
                       alertify.set('notifier','position','top-center');
                        alertify.success(response.status);
                    }
                });
            });



      });
      </script>
