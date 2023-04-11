@extends('admin.master.master')
@section('title')
Dashboard
@endsection


@section('body')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Admin
                <small class="text-muted">Welcome to Admin Panel</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.subcategory') }}">All Sub-Category</a></li>

                    <li class="breadcrumb-item">Create Sub-Category</li>
                 
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    	
        
        <div class="row clearfix mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Add Category</h2>
                       
                    </div>
                    <div class="body">
                         <form action="{{ route('admin.subcategory.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                             <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Category Name </label>
                                <select name="category_slug" id="roles" class="form-control">
               @foreach($categories as $newcat)                     
                <option value="{{ $newcat->category_slug }}">{{ $newcat->category_name }}</option>
               @endforeach
                                   
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Sub Category Name</label>
                                <input type="text" class="form-control" id="name" name="subcategory_name" placeholder="Enter Name">
                            </div>
                           <div class="form-group col-md-6 col-sm-12">
                                <label for="password">Status</label>
                                <select name="status" id="roles" class="form-control">
                                    
                <option value="1">Active</option>
                <option value="0">InActive</option>
                                   
                                </select>
                            </div>
                        </div>

                       

                        


                        
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Sub-Category</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 
@endsection

@section('scripts')


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

 
  

