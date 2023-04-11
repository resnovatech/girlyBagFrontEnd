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
                                <h4 class="font-size-18">Shipping Charge</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                                    <li class="breadcrumb-item active">Update Shipping Charge</li>
                                </ol>
                            </div>
                        </div>

                       
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                <form class="custom-validation" action="{{ route('admin.shipping_charge.update') }}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="form-group ">
                                                <label for="password">Shipping Address Name</label>
                                <select name="ship_id" id="roles" class="form-control">
                                @foreach($ships as $charge)             
                <option value="{{$charge->id}}" {{$cats->ship_id == $charge->id ? 'seleted':''}}>{{$charge->area}}</option>
                @endforeach
                                   
                                </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Method:</label>
                                                    <input type="text" class="form-control" name="method" value="{{$cats->method}}"/>
                                                    <input type="hidden" class="form-control" name="id" value="{{$cats->id}}"/>
                                                </div>



                                                <div class="form-group ">
                                                    <label>Price:</label>
                                                    <input type="text" class="form-control" name="price" value="{{$cats->price}}" />
                                                </div>


                                               

                                            </div>
                                        </div>

                                    </div> <!-- end col -->


                                    <div class="col-lg-12">
                                        <div class="float-right d-none d-md-block">
                                            <div class="form-group mb-4">
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                        update
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

 
  

