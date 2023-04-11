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
                                <h4 class="font-size-18">Product History</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product and Services</a></li>
                                    <li class="breadcrumb-item active">Manage Product and Services</li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="float-right d-none d-md-block">
                                <div class="dropdown">
                                @if (Auth::guard('admin')->user()->can('product.create'))
                                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" onclick="window.location.href='{{route('admin.product.create')}}'">
                                        <i class="far fa-calendar-plus  mr-2"></i> Add New Product
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <h4 class="card-title">Product</h4>
                        </div>

                        <div class="col-4">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('/')}}public/admindashboard/assets/images/services-icon/01.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Product</h5>
                                        <h4 class="font-weight-medium font-size-24">1,685</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('/')}}public/admindashboard/assets/images/services-icon/01.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Brand</h5>
                                        <h4 class="font-weight-medium font-size-24">1,685</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{asset('/')}}public/admindashboard/assets/images/services-icon/01.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Stock Out Product</h5>
                                        <h4 class="font-weight-medium font-size-24">1,685</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Sell Price</th>
                                                <th>Discount</th>
                                                <th>Available Stocks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                        @foreach($products as $newpro)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$newpro->product_name}}</td>
                                                <td>{{$newpro->category_slug}}</td>
                                                <td>
                                                @foreach($brands as $newBrand)
                                                @if($newBrand->id == $newpro->brand_id)
                                                {{$newBrand->name}}

                                                @endif
                                                @endforeach
                                                </td>
                                                <td>{{$newpro->sell_price}}</td>
                                                <td>{{$newpro->discount_amount}}</td>
                                                <td>{{$newpro->stock_unit}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary waves-light waves-effect" onclick="window.location.href='{{ route('admin.product.view', $newpro->id) }}'"><i class="fa fa-eye"></i></button>
                                                        <button type="button" class="btn btn-primary waves-light waves-effect" onclick="window.location.href='{{ route('admin.product.edit', $newpro->id) }}'"><i class="fas fa-pencil-alt"></i></button>
                                                        <button type="button" class="btn btn-danger waves-light waves-effect" onclick="deleteTag({{ $newpro->id}})"><i class="far fa-trash-alt"></i></button>

                                                        <form id="delete-form-{{ $newpro->id }}" action="{{ route('admin.product.destroy',$newpro->id) }}" method="POST" style="display: none;">
                     
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