@extends('admin.master.master')
@section('title')
Dashboard
@endsection


@section('body')
<div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="page-title-box">
                                <h4 class="font-size-18">Product Child Description</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product and Services</a></li>
                                    <li class="breadcrumb-item active">Update Product Child Description</li>
                                </ol>
                            </div>
                        </div>

                       
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                <form class="custom-validation" action="{{route('admin.child_description.update')}}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="form-group">
                                                    <label>Parent Category</label>
                                                    <select class="form-control" name="parent_id" id="category">
                                                        <option>Select</option>
                                                        @foreach($pdes as $newcatlist)                     
                <option value="{{ $newcatlist->id }}"  {{$cats->parent_id == $newcatlist->id ? 'selected':''}}>
                
                @foreach($categories_new as $create_new)

                @if($create_new->id == $newcatlist->parent_id)
                
                {{ $create_new->category_name }}
                
                @endif
                
                @endforeach
                </option>
               @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Description Parent Category Name:</label>
                                                    <select class="form-control" id="subcategory" name="description_category">
                                                    @foreach($pdes as $newcatlist)  

        <option value="{{ $newcatlist->description_category }}"  {{$cats->description_category == $newcatlist->description_category ? 'selected':''}}>{{$cats->description_category}}</option>
                                                    @endforeach
                                                       
                                                    </select>
                                                </div>

                                                <div class="form-group ">
                                                    <label>Child Category Name:</label>
                                                    <input type="text" class="form-control" name="description_child" value="{{$cats->description_child}}" />
                                                    <input type="hidden" class="form-control" name="id" value="{{$cats->id}}" />
                                                </div>

                                            </div>
                                        </div>

                                    </div> <!-- end col -->


                                    <div class="col-lg-12">
                                        <div class="float-right d-none d-md-block">
                                            <div class="form-group mb-4">
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                        Update
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </form>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
 
@endsection

@section('scripts')


<script>
	$(document).ready(function(){
		$("#category").on('change',function(){
			var catId=$(this).val();
         //ajax

         $.ajax({
         	headers: {
         		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         	},
         	url:"{{route('admin.select_people')}}",
         	type:"POST",
         	data:{'catId':catId},
         	dataType:'json',
         	success:function(data){
         		console.log(data);
         		$('#subcategory').empty();
         		$.each(data,function(index,subcatObj){

         			$("#subcategory").append('<option value ="'+subcatObj.description_category+'">'+subcatObj.description_category+'</option>');
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
    /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
            implementAllChecked();
         }
         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }
        
</script>

@endsection

 
  

