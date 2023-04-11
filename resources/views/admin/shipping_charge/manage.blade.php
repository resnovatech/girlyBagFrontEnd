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
                                    <li class="breadcrumb-item active">Shipping Charge</li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="float-right d-none d-md-block">
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('shipcharge.create'))
                                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg" type="button">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Shipping Charge
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Shipping Area Name</th>
                                                <th>Shipping Method</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                        @foreach ($categories as $category) 
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>
                                                @foreach($ships as $charge)
                                       @if($category->ship_id == $charge->id)

                                          {{$charge->area}}

                                      @endif
                                      @endforeach
                                    </td>
                                                <td>{{ $category->method }}</td>
                                                <td>{{ $category->price }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                    @if (Auth::guard('admin')->user()->can('shipcharge.edit'))
                                                        <a type="button" href="{{ route('admin.shipping_charge.edit', $category->id) }}" class="btn btn-primary waves-light waves-effect"><i class="fas fa-pencil-alt"></i></a>
                                                        @endif
                                                        @if (Auth::guard('admin')->user()->can('shipcharge.delete'))
                                                        <buttona type="button" class="btn btn-danger waves-light waves-effect" onclick="deleteTag({{ $category->id}})">
                                                        <i class="far fa-trash-alt"></i></button>
@endif
                                                        <form id="delete-form-{{ $category->id }}" action="{{ route('admin.shipping_charge.destroy',$category->id) }}" method="POST" style="display: none;">
                     
                     @csrf
                     
                 </form>
                                                    </div>
                                                </td>
                                            </tr>
                                          @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!--  Modal content for the above example -->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Add New Shipping Charge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form class="custom-validation" action="{{ route('admin.shipping_charge.store') }}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                            <div class="form-group ">
                                                <label for="password">Shipping Address Name</label>
                                <select name="ship_id" id="roles" class="form-control">
                                @foreach($ships as $charge)             
                <option value="{{$charge->id}}">{{$charge->area}}</option>
                @endforeach
                                   
                                </select>
                                                </div>
                                                <div class="form-group ">
                                                    <label>Method:</label>
                                                    <input type="text" class="form-control" name="method" />
                                                </div>



                                                <div class="form-group ">
                                                    <label>Price:</label>
                                                    <input type="text" class="form-control" name="price" />
                                                </div>


                                               

                                            </div>
                                        </div>

                                    </div> <!-- end col -->


                                    <div class="col-lg-12">
                                        <div class="float-right d-none d-md-block">
                                            <div class="form-group mb-4">
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
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
         }
     </script>

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
@endsection