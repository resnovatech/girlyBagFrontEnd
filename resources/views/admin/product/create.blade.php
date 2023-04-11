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
                                <h4 class="font-size-18">Add New Product</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a>
                                    </li>
                                    <li class="breadcrumb-item active">Add New Product</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                    <!-- end page title -->
                    <form action="{{route('admin.product.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">

                                        <p class="card-title-desc">Please Fill Up The Form Carefully</p>

                                        <div class="row">

                                            <div class="form-group col-lg-12">
                                                <label>Product Name <span style="color: red;">*</span></label>
                                                <input type="text" class="form-control" name="product_name">
                                            </div>



                                            <div class="col-md-8">
                              <div class="form-group" style="clear: both;">
                            <label for="name">Image <span style="color: red;">*</span></label>
                            <input type="file" class="form-control" id="name" name="image[]" placeholder="Enter a Permission Name">
                        </div>
                            </div>
                            <div class="col-md-4">
                                <label for="name">Button</label>
                            <button type="button" class="btn btn-success btn-block mr-3 addextras" id="inputextras">Add</button>
                        </div>

                        <div class="col-md-12 input_field_wrapper">

                               </div>
                               <br><br>
                                            <div class="form-group col-lg-6">
                                                <label class="control-label">Brand Name <span style="color: red;">*</span></label>
                                                <select class="form-control select2" name="brand_id">
                                                    <option>Select </option>
                                                    @foreach($brands as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                  @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Buying Price</label>
                                                <input type="number" class="form-control" name="buy_price">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Selling Price <span style="color: red;">*</span></label>
                                                <input type="number" class="form-control" name="sell_price">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Unit <span style="color: red;">*</span></label>
                                                <input type="number" class="form-control" name="unit">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Volume <span style="color: red;">*</span></label>
                                                <select class="form-control" name="volume_id">
                                                    <option>Select</option>
                                                    @foreach($volumes as $volume)
                                                    <option value="{{$volume->id}}">{{$volume->name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Reward Point Category <span style="color: red;">*</span></label>
                                                <select class="form-control" name="reward_id">
                                                    <option>Select</option>
                                                    @foreach($rewards as $volume1)
                                                    <option value="{{$volume1->id}}">{{$volume1->name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Reward Point for one product <span style="color: red;">*</span></label>
                                                <input type="number" class="form-control" name="reward_point_product_count">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Discount in Percent or flat</label>
                                                <select class="form-control" name="discount_type">
                                                    <option disabled>Select</option>
                                                    <option value="1">Percent</option>
                                                    <option value="0">flat</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Discount amount</label>
                                                <div>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="discount_amount">
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
                                                    <option readonly>Select</option>
                                                    @foreach($suppliers as $sup)
                                                    <option value="{{$sup->id}}">{{$sup->name}}</option>
                                                   @endforeach

                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Website Visible <span style="color: red;">*</span></label>
                                                <select class="form-control select2" name="status">
                                                    <option>Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Stocks Unit</label>
                                                <input type="number" class="form-control" name="stock_unit">
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Alert Quantity Unit</label>
                                                <input type="number" class="form-control" name="alert_quantity">
                                            </div>



                                            <div class="form-group col-lg-6">
                                                <label>Purchase Limit</label>
                                                <input type="number" class="form-control" name="purchase_limit">
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label>Describe the condition in detail <span style="color: red;">*</span></label>
                                                <textarea id="editor" name="des"></textarea>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <label>Short Description</label>
                                                <input type="text" class="form-control" name="short_des">
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
                                                <label>Parent Category <span style="color: red;">*</span></label>
                                                <select class="form-control " name="category_slug" id="category">
                                                    <option readonly>Select</option>
                                                    @foreach($categories as $cat)
                                                    <option value="{{$cat->category_slug}}">{{$cat->category_name}}</option>
                                                   @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label>Child Category</label>
                                                <select class="form-control " name="subcategory_slug" id="subcategory">

                                                </select>
                                            </div>

                                            <div class="card-body">
                                                <div class="table-responsive">
                                                <table class="table table-bordered" id="dynamicAddRemove">
<tr>
<th>Parent Description <span style="color: red;">*</span></th>
<th>Child Description <span style="color: red;">*</span></th>
<th>Action</th>
</tr>
<tr>
<td>

<select name="pdes[]"  id ="catpdes0"  class="form-control click">
    <option value="">Select</option>
@foreach($cdes as $newtest)
<option value="{{$newtest->description_category}}">{{$newtest->description_category}}</option>
@endforeach
</select>




</td>
<td><select name="cdes[]"  id ="catcdes0" class="form-control"></select></td>
<td><button type="button" name="add" id="add-btn" class="btn btn-success">Add More</button></td>
</tr>
</table>
                                                </div>
                                            </div>

                                            <!--<div class="col-md-8">
                                                <div class="form-group" style="clear: both;">
                                              <label for="name">Short Description</label>
                                              <input type="text" class="form-control" id="name" name="sh[]" placeholder="Enter a Short Description">
                                          </div>
                                              </div>
                                              <div class="col-md-4">
                                                  <label for="name">Button</label>
                                              <button type="button" class="btn btn-success btn-block mr-3 addextras1" id="inputextras1">Add</button>
                                          </div>

                                          <div class="col-md-12 input_field_wrapper1">

                                                 </div>-->



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

@endsection


@section('scripts')
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

<script type="text/javascript">
    $(document).ready(function(){
    var maxFieldLimit = 20; //Input fields increment limitation
    var add_more_field = $('.addextras1'); //Add button selector
    var Fieldwrapper = $('.input_field_wrapper1'); //Input field wrapper
    var fieldHTML = '<div class="col-md-12"><div class="form-group" style="clear: both;"><label for="name">Short Description</label><input type="text" class="form-control" id="name" name="sh[]" placeholder="Enter a Description Detail"></div></div>';

    var x = 1; //Initial field counter is 1
    $(".addextras1").click(function(){ //Once add button is clicked

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
               // console.log(data);
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
