@extends('admin.master.master')
@section('title')
Dashboard
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .main-section{
            margin:0 auto;
            padding: 20px;
            margin-top: 100px;
            background-color: #fff;
            box-shadow: 0px 0px 20px #c1c1c1;
        }
        .fileinput-remove,
        .fileinput-upload{
            display: none;
        }
    </style>
@endsection


@section('body')
<div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4 class="font-size-18">Update Product</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active">Update Product</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                    <!-- end page title -->
                    <form action="{{route('admin.product.update')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <p class="card-title-desc">Please Fill Up The Form Carefully</p>

                                        <div class="row">

                                            <div class="form-group col-lg-12">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}">
                                           <input type="hidden" class="form-control" name="id" value="{{$products->id}}">
                                            </div>






                                            <div class="form-group col-lg-6">
                                                <label class="control-label">Brand Name</label>
                                                <select class="form-control select2" name="brand_id">

                                                    @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}"  {{$brand->id == $products->brand_id ? 'selected':''}}>{{$brand->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Buying Price</label>
                                                <input type="number" class="form-control" name="buy_price" value="{{$products->buy_price}}">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Selling Price</label>
                                                <input type="number" class="form-control" name="sell_price" value="{{$products->sell_price}}">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Unit</label>
                                                <input type="number" class="form-control" name="unit" value="{{$products->unit}}">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Volume</label>
                                                <select class="form-control" name="volume_id">

                                                    @foreach($volumes as $volume)
                                                    <option value="{{$volume->id}}"  {{$volume->id == $products->product_id ? 'selected':''}}>{{$volume->name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Reward Point Category</label>
                                                <select class="form-control" name="reward_id">

                                                    @foreach($rewards as $volume1)
                                                    <option value="{{$volume1->id}}" {{$volume1->id == $products->product_id ? 'selected':''}}>{{$volume1->name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Reward Point for one product</label>
                                                <input type="number" class="form-control" name="reward_point_product_count" value="{{$products->reward_point_product_count}}">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Discount in Percent or flat</label>
                                                <select class="form-control" name="discount_type">
                                                    <option disabled>Select</option>
                                                    <option value="1" {{$products->discount_type == 1 ? 'selected':''}}>Percent</option>
                                                    <option value="0" {{$products->discount_type == 0 ? 'selected':''}}>flat</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Discount amount</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="discount_amount" value="{{$products->discount_amount}}">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i
                                                                    class="fas fa-percent "></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Supplier</label>
                                                <select class="form-control select2" name="supplier_id">
                                                    <option>Select</option>
                                                    @foreach($suppliers as $sup)
                                                    <option value="{{$sup->id}}" {{$sup->id == $products->supplier_id ? 'selected':''}}>{{$sup->name}}</option>
                                                   @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Website Visible</label>
                                                <select class="form-control select2" name="status">
                                                    <option>Select</option>
                                                    <option value="1" {{$products->status == 1 ? 'selected':''}}>Yes</option>
                                                    <option value="0" {{$products->status == 0 ? 'selected':''}}>No</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Stocks Unit</label>
                                                <input type="number" class="form-control" name="stock_unit" value="{{$products->stock_unit}}">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Alert Quantity Unit</label>
                                                <input type="number" class="form-control" name="alert_quantity" value="{{$products->alert_quantity}}">
                                            </div>



                                            <div class="form-group col-lg-6">
                                                <label>Purchase Limit</label>
                                                <input type="number" class="form-control" name="purchase_limit" value="{{$products->purchase_limit}}">
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label>Describe the condition in detail</label>
                                                <textarea id="editor" name="des">{!!$products->des!!}</textarea>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <label>Short Description</label>
                                                <input type="text" class="form-control" name="short_des" value="{{$products->short_des}}">
                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label>Parent Category</label>
                                                <select class="form-control " name="category_slug" id="category">
                                                    <option disabled>Select</option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{$cat->category_slug}}" {{$cat->category_slug == $products->category_slug ? 'selected':''}}>{{$cat->category_name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Child Category</label>
                                                <select class="form-control " name="subcategory_slug" id="subcategory">
                                                @foreach($subcats as $newcatlist)

<option value="{{ $newcatlist->subcategory_slug }}"  {{$products->subcategory_slug == $newcatlist->subcategory_slug ? 'selected':''}}>{{$newcatlist->subcategory_slug}}</option>
                                            @endforeach
                                                </select>
                                            </div>

                                            <div class="card-body">


                        <button type="button" class="btn btn-primary waves-light waves-effect add-productimage" data-productid="{{$products->id}}">Add More Image</button>


                                                    <div class="table-responsive mt-4" >
                                                <table class="table table-bordered" >
<tr>
<th>Image</th>

<th>Action</th>
</tr>
@foreach($image_list as $newImage)
<tr>
<td>

 <img src="{{asset('/')}}{{'public/upload/'.$newImage->image}}" height="50px" width="50px"/>




</td>

<td>
    <button type="button" class="btn btn-primary waves-light waves-effect edit-product1" data-productidimage="{{$newImage->id}}">
        <i class="fas fa-pencil-alt"></i></button>

        <button type="button" class="btn btn-danger waves-light waves-effect" onclick="deleteTag({{ $newImage->id}})"><i class="far fa-trash-alt"></i></button>

        <form id="delete-form-{{ $newImage->id }}" action="{{ route('admin.product.product_img_delete',$newImage->id) }}" method="POST" style="display: none;">

@csrf

</form>


    </td>
</tr>
@endforeach
</table>
                                                </div>
                                                <div class="table-responsive">
                                                <table class="table table-bordered" >
<tr>
<th>Parent Description</th>
<th>Child Description</th>
<th>Action</th>
</tr>
@foreach($des_list as $newtest1)
<tr>
<td>

{{ $newtest1->pdes }}




</td>
<td>{{ $newtest1->cdes }}</td>
<td> <button type="button" class="btn btn-primary waves-light waves-effect edit-product" data-productid="{{$newtest1->id}}"><i class="fas fa-pencil-alt"></i></button></td>
</tr>
@endforeach
</table>
                                                </div>


                                                       <div class="table-responsive">
                                                <table class="table table-bordered" id="dynamicAddRemove">
<tr>
<th>Parent Description</th>
<th>Child Description</th>
<th>Action</th>
</tr>

<tr>
<td>

<select name="pdes[]"  id ="catpdes0"  class="form-control click">
    <option value="0"  >Select</option>
@foreach($cdes as $newtest)

<option value="{{$newtest->description_category}}"  >{{$newtest->description_category}}</option>

@endforeach
</select>




</td>
<td><select name="cdes[]"  id ="catcdes0" class="form-control"></select></td>
<td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>
</tr>

</table>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="float-right d-none d-md-block">
                                                    <div class="form-group mb-4">
                                                        <div>
                                                            <button type="submit"
                                                                class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                                Submit
                                                            </button>
                                                            <button type="reset"
                                                                class="btn btn-secondary btn-lg  waves-effect">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div> <!-- end col -->



                        </div> <!-- end row -->
                    </form>




                </div> <!-- container-fluid -->
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
<script type="text/javascript">
    function deleteTag(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                document.getElementById('delete-form-'+id).submit();
            } else if (
                // Read more about handling dismissals
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }
</script>
<script>
    $(document).ready(function(){
    //edit product
       $(".edit-product").click(function(){
         var productid=$(this).data('productid');
        //ajax
         $.ajax({
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('admin.product.productEdit')}}",
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



         //edit product image

       $(".edit-product1").click(function(){
         var productidimage=$(this).data('productidimage');
        //ajax
         $.ajax({
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('admin.product.productEditimage')}}",
          type:"POST",
          data:{'productidimage':productidimage},
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






         //add product image

       $(".add-productimage").click(function(){
         var productid=$(this).data('productid');
        //ajax
         $.ajax({
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url:"{{route('admin.product.productAddimage')}}",
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
   <script type="text/javascript">
    $(document).ready(function(){
    var maxFieldLimit = 20; //Input fields increment limitation
    var add_more_field = $('.addextras'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-md-12"><div class="form-group" style="clear: both;"><label for="name">Image</label><input type="file" class="form-control" id="name" name="image[]" placeholder="Enter a Permission Name"></div></div>';

    var x = 1; //Initial field counter is 1
    $(".addextras").click(function(){ //Once add button is clicked

        if(x < maxFieldLimit){ //Check maximum number of input fields
            x++; //Increment field counter
            $(Fieldwrapper).append(fieldHTML); // Add field html
        }
    });
    $(Fieldwrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
    <script>
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });
    </script>
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
++i;
$("#dynamicAddRemove").append('<tr><td><select name="pdes[]"  id ="catpdes'+i+'"  class="form-control click">@foreach($cdes as $newtest)<option value="{{$newtest->description_category}}">{{$newtest->description_category}}</option>@endforeach</select></td><td><select name="cdes[]"  id ="catcdes'+i+'" class="form-control"></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    $('#catpdes'+i).on('change',function(){
            var catId=$(this).val();
           // var newpid = $(this).data("newpid")
         //ajax
 //console.log(newpid);
         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{route('admin.select_subcat_des')}}",
            type:"POST",
            data:{'catId':catId},
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#catcdes'+i).empty();
                $.each(data,function(index,subcatObj){

                    $('#catcdes'+i).append('<option value ="'+subcatObj.description_child+'">'+subcatObj.description_child+'</option>');
                });

            },
            error:function(){
                alert("error ase");
            }
         });
     //endajax
 });


});
$(document).on('click', '.remove-tr', function(){
$(this).parents('tr').remove();
});
</script>
<script>



	$(document).ready(function(){

        $("#catpdes0").on('change',function(){
            var catId=$(this).val();
           // var newpid = $(this).data("newpid")
         //ajax
 //console.log(newpid);
         $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{route('admin.select_subcat_des')}}",
            type:"POST",
            data:{'catId':catId},
            dataType:'json',
            success:function(data){
                console.log(data);
                $('#catcdes0').empty();
                $.each(data,function(index,subcatObj){

                    $("#catcdes0").append('<option value ="'+subcatObj.description_child+'">'+subcatObj.description_child+'</option>');
                });

            },
            error:function(){
                alert("error ase");
            }
         });
     //endajax
 });

	});
</script>


<script>
	$(document).ready(function(){
		$("#category").on('change',function(){
			var catId=$(this).val();
         //ajax

         $.ajax({
         	headers: {
         		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         	},
         	url:"{{route('admin.select_subcat')}}",
         	type:"POST",
         	data:{'catId':catId},
         	dataType:'json',
         	success:function(data){
         		console.log(data);
         		$('#subcategory').empty();
         		$.each(data,function(index,subcatObj){

         			$("#subcategory").append('<option value ="'+subcatObj.subcategory_slug+'">'+subcatObj.subcategory_name+'</option>');
         		});

         	},
         	error:function(){
         		alert("error ase");
         	}
         });
     //endajax
 });
	});
</script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        $("#file-1").fileinput({
            theme: 'fa',
            uploadUrl: "/image-view",
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                };
            },
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            maxFileSize:2000,
            maxFilesNum: 10,
            slugCallback: function (filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
    </script>
@endsection
