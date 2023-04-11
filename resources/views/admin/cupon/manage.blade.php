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
                    <h4 class="font-size-18">Coupon History</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Coupon</a></li>
                        <li class="breadcrumb-item active">Manage Coupon</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        @if (Auth::guard('admin')->user()->can('cupon.add'))
                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" onclick="window.location.href='{{ route('admin.cupon.create') }}'">
                            <i class="far fa-calendar-plus  mr-2"></i> Add New Coupon
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
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Active From</th>
                                    <th>Active To</th>
                                    <th>Discount Type</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach($brands as $newbrand)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $newbrand->title }} </td>
                                    <td>{{ $newbrand->code }}</td>
                                    <td>{{ $newbrand->active_from }}</td>
                                    <td>{{ $newbrand->active_to }}</td>
                                    <td>
                                        @if($newbrand->discount_type == 0 )
Fixed

                                        @else
Percentage

                                        @endif

                                    </td>
                                    <td>{{ $newbrand->discount_amount }}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if (Auth::guard('admin')->user()->can('cupon.edit'))
<button type="button" class="btn btn-primary waves-light waves-effect" onclick="window.location.href='{{ route('admin.cupon.edit',$newbrand->id) }}'">
    <i class="fas fa-pencil-alt"></i></button>
    @endif

@if (Auth::guard('admin')->user()->can('cupon.delete'))
<buttona type="button" class="btn btn-danger waves-light waves-effect" onclick="deleteTag({{ $newbrand->id}})">
<i class="far fa-trash-alt"></i></button>
@endif
<form id="delete-form-{{ $newbrand->id }}" action="{{ route('admin.cupon.destroy',$newbrand->id) }}" method="POST" style="display: none;">

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
