<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}public/front/images/favicon.png"/>
    <link href="{{ asset('/') }}public/front/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/css/vendor/vendor.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}public/front/fonts/icomoon/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open%20Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
          rel="stylesheet">
          <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

          <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css"
          integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

          <!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<style>
    .searchImage {
        height: 60px;
        width: 60px;
    }

</style>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

@yield('css')



<script>
    $( function() {
      $( "#datetimepicker12" ).datepicker();
    } );
    </script>
</head>

<body class="template-product template-collection has-smround-btns has-loader-bg equal-height has-sm-container">

    @include('front.include.header')
    @include('front.include.header_side_panel')




   @yield('body')


@include('front.include.footer')




<script src="{{ asset('/') }}public/front/js/vendor-special/lazysizes.min.js"></script>
<script src="{{ asset('/') }}public/front/js/vendor-special/ls.bgset.min.js"></script>
<script src="{{ asset('/') }}public/front/js/vendor-special/ls.aspectratio.min.js"></script>

<script src="{{ asset('/') }}public/front/js/vendor-special/jquery.ez-plus.js"></script>
<script src="{{ asset('/') }}public/front/js/vendor/vendor.min.js"></script>
<script src="{{ asset('/') }}public/front/js/app-html.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
       <script>
@if($errors->any())
    @foreach($errors->all() as $error)
          toastr.error('{{ $error }}','Error',{
              closeButton:true,
              progressBar:true,
           });
    @endforeach
@endif
</script>

@yield('scripts')

<script>
    function increaseValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value = value + 1;
    document.getElementById('number').value = value;
}
function reduceValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value = value - 1;
    document.getElementById('number').value = value;
}
</script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value = value + 1;
        document.getElementById('number').value = value;
    }

    function reduceValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value = value - 1;
        document.getElementById('number').value = value;
    }

</script>
<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    $(document).ready(function () {
        cartload();
        // cartloadalldata();
    });


    $(document).ready(function () {
        // cartload();
        cartloadalldata();
    });

    function cartload() {
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
                $('.basket-item-count').append($('<span class="badge badge-pill red">' + value[
                    'totalcart'] + '</span>'));
            }
        });
    }



    function cartloadalldata() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });





                $.ajax({

                    url: "{{ route('load_cart_data_all_data') }}",
                    method: "GET",
                    dataType: 'json',
                    success: function (response) {
                        var data = ""
                        var i = 0;
                        $.each(response, function (key, value) {

                            ++i;

                            data = data +
                                "<div class='minicart-prd row removediv' id='side_delete'>"
                            data = data +
                                "<div class='minicart-prd-image image-hover-scale-circle col'>"
                            data = data + "<a href='{{route("product_single_view"," + value.item_slug + ")}}'>"

                            //data = data+ "<img class='lazyload fade-up' src='data:{{asset("/")}}{{ "public/upload/+'value.item_image'+"}}' data-src='{{asset("/")}}{{ "public/upload/+'value.item_image'+" }}' alt=''>"
                            data =
                                `${data}  <img class='lazyload fade-up' src='https://thegirlybag.com/public/upload/${value.item_image}' style="height">`
                            data = data + "</a>"
                            data = data + "</div>"
                            data = data + "<div class='minicart-prd-info col'>"
                            data = data + "<h2 class='minicart-prd-name'>" + value.item_name +
                                " </h2>"
                            data = data + "<div class='minicart-prd-qty quantity12'>"
                            data = data + "<div class='qty qty-changer  quantity cartpage'>"
                            data = data + "<span class='minicart-prd-qty-label'> Quantity: </span>"


                            data =
                                `${data} <button   onclick='decreaseBtn1(${i})'></button>`


                            data =
                                `${data} <input type='text' id='newquan${i}'    max='10' value='${value.item_quantity}' >`

                                data =
                                `${data} <input type='hidden' id='newproductId${i}'   value='${value.item_id}' >`


                            data =
                                `${data}<button onclick='increaseBtn1(${i})' >+</button>`


                            data = data + "</div>"
                            data = data + "</div>"
                            data = data + "<div class='minicart-prd-price prd-price'>"

                            data = `${data}<div class='price-new'  id='pprice${i}'> ৳ ${value.item_quantity*value.item_price} </div>`



                            data = data + "</div>"


                            data = data + "</div>"
                            data = data + "<div class='minicart-prd-action'>"
                            data =
                                `${data}  <input type='hidden' value='${value.item_id}' id='delProId${i}' name='id'> `
                            data =
                                `${data} <button class='cart-table-prd-remove ' onclick='deleteData(${i})' data-tooltip='Remove Product' style='background-color:white; border: none !important'> <i class='icon-recycle'></i> </button>`
                            data = data + "</div>"

                            data = data + "</div>"


                            //     data = data + "<tr>"
                            //     data = data + "<td>"+value.item_id+"</td>"
                            //     data = data + "<td>"+value.item_name+"</td>"
                            //  //data = data +  "<td>" <img src='localhost/girly_bag_add_tocard_updatecard_version/public/upload/"+value.item_image+"'> "</td>"
                            //   data = `${data} <td> <img src='http://localhost/girly_bag_add_tocard_updatecard_version/public/upload/${value.item_image}' style="height"></td>`
                            //     data = data + "</tr>"


                        })
                        //cosole.log(response.data);
                        $('#ajaxdatane').html(data);
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

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();

            //alert(quantity);

            $.ajax({
                url: "{{ route('cart.store') }}",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    // alertify.set('notifier', 'position', 'top-center');
                    // alertify.success(response.status);

                    $("#footer_cart1").show();
                    cartload();
                    cartloadalldata();
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
                    // alertify.set('notifier', 'position', 'top-right');
                    // alertify.success(response.status);
                }
            });

        });

        //quantity increment button

        $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
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
            if (value > 1) {
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });


        //side bar increment and dcrement





        //update quantity


        $('.changeQuantity').click(function (e) {
            e.preventDefault();

            var thisClick = $(this);

            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity': quantity,
                'product_id': product_id,
            };

            $.ajax({
                url: "{{ route('updatetocart') }}",
                type: "POST",
                data: data,
                success: function (response) {
                    //window.location.reload();
                    //console.log(response.gtprice);
                    thisClick.closest(".newtest").find(
                        '.cart-table-prd-price-total').text(response.gtprice);
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');
                    // alertify.set('notifier', 'position', 'top-center');
                    // alertify.success(response.status);
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
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');


                    cartload();
                    cartloadalldata();
                    // alertify.set('notifier', 'position', 'top-center');
                    // alertify.success(response.status);
                }
            });
        });







    });



    function increaseBtn1(product_id) {

var quantity_id ='newquan'+product_id;
var productId = 'newproductId'+product_id;

var productWisePrice ='pprice'+product_id;

//console.log(quantity_id);

// var pro_id = product_id;




var incre_value =$('#'+quantity_id).val();
var newProductId =$('#'+productId).val();

//alert(newProductId);

var value = parseInt(incre_value, 10);
value = isNaN(value) ? 0 : value;
if (value < 10) {
    value++;
    $('#'+quantity_id).val(value);
}




//alert(value);


var data = {
'_token': $('input[name=_token]').val(),
'quantity': value,
'product_id': newProductId,
};

$.ajax({
url: "{{ route('update-to-cart_side_bar') }}",
type: "POST",
data: data,
success: function (response) {
//window.location.reload();
//console.log(response.gtprice);
$('#'+productWisePrice).text('৳' + response.gtprice);
$('#totalajaxcall').load(location.href + ' .totalpricingload');
// cartload();
// cartloadalldata();
// alertify.set('notifier', 'position', 'top-center');
// alertify.success(response.status);
}
});







}



function decreaseBtn1(product_id) {



var quantity_id ='newquan'+product_id;
var productId = 'newproductId'+product_id;

var productWisePrice ='pprice'+product_id;

//console.log(quantity_id);

// var pro_id = product_id;




var incre_value =$('#'+quantity_id).val();
var newProductId =$('#'+productId).val();

//alert(newProductId);

var value = parseInt(incre_value, 10);
value = isNaN(value) ? 0 : value;
if (value > 1) {
    value--;
    $('#'+quantity_id).val(value);
}




//alert(value);


var data = {
'_token': $('input[name=_token]').val(),
'quantity': value,
'product_id': newProductId,
};

$.ajax({
url: "{{ route('update-to-cart_side_bar') }}",
type: "POST",
data: data,
success: function (response) {
//window.location.reload();
//console.log(response.gtprice);
$('#'+productWisePrice).text('৳' + response.gtprice);
$('#totalajaxcall').load(location.href + ' .totalpricingload');
// cartload();
// cartloadalldata();
// alertify.set('notifier', 'position', 'top-center');
// alertify.success(response.status);
}
});








}


function deleteData(indexId) {

//alert(indexId);

var deleteProId ='delProId'+indexId;


var thisDeletearea = $(this);
var thisDeleteareaNew = $(this);
var product_id = $("#"+deleteProId).val();
//alert(product_id);


var data = {
    '_token': $('input[name=_token]').val(),
    "product_id": product_id,
};

// $(this).closest(".cartpage").remove();

$.ajax({
    url: "{{ route('deletefromcart_sidebar') }}",
    type: "DELETE",
    data: data,
    success: function (response) {
        //window.location.reload();
        thisDeleteareaNew.closest(".removediv1").remove();
        thisDeletearea.closest(".removediv").remove();
        $('#totalajaxcall').load(location.href + ' .totalpricingload');


        cartload();
        cartloadalldata();
        // alertify.set('notifier', 'position', 'top-center');
        // alertify.success(response.status);
    }
});



}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
</script>
<script type="text/javascript">
    $(document).ready(function () {



        $('#employee_searchone').on('keyup', function () {




            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var value = $(this).val();



            //alert(value);



            $.ajax({
                url: "{{ route('autocomplete') }}",
                type: "GET",
                data: {
                    'search': value
                },
                success: function (data) {


                    $('#dest').html(data);

                }
            });






        });




        $('#employee_searchone1').on('keyup', function () {




            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var value = $(this).val();



            //alert(value);



            $.ajax({
                url: "{{ route('autocomplete') }}",
                type: "GET",
                data: {
                    'search': value
                },
                success: function (data) {


                    $('#dest1').html(data);

                }
            });






        });




    });

</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
