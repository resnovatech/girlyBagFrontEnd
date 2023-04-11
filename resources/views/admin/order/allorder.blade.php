@extends('admin.master.master')
@section('title')
All Order
@endsection


@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Order History</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                        <li class="breadcrumb-item active">Manage Recieved Order</li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                       <!-- <button class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button" onclick="window.location.href='add_new_product&services.php'">
                            <i class="far fa-calendar-plus  mr-2"></i>Add New Order
                        </button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <h4 class="card-title">Recieve Orders</h4>
            </div>

            <div class="col-4">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Order</h5>
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
                                <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Order Recieved</h5>
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
                                <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/01.png" alt="">
                            </div>
                            <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Recieve Amount</h5>
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
                                    <th>Order Id</th>
                                    <th>Customer Name</th>
                                    <th>Mobile</th>
                                    <th>Total</th>
                                    <th>Order Time</th>
                                    <th>Payment Method</th>
                                    <th>Payment Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($all_order as $all_new)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $all_new->pin }}</td>
                                    <td>{{ $all_new->Fname.' '.$all_new->lname }}</td>
                                    <td>{{ $all_new->phone }}</td>
                                    <td>{{ $all_new->order_total }}</td>
                                    <td>{{ $all_new->date }}</td>
                                    <td>{{ $all_new->payment_type }}</td>

                                    <td>
                                        @if($all_new->payment_status == 0)
                                        UNPAID
                                        @else
PAID

                                        @endif

                                    </td>
                                    <td>
                                        @if($all_new->status == 0)
                                        Pending
                                       @elseif($all_new->status == 1)

                                     Confirmed
                                       @elseif($all_new->status == 2)
Processing
@elseif($all_new->status == 3)
Cancelled

                                       @else
Delivared

                                       @endif

                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary waves-light waves-effect"
                                            onclick="window.location.href='{{ route('admin.order.view',$all_new->Newt) }}'"><i class="fa fa-eye"></i></button>

                            <button type="button" class="btn btn-primary waves-light waves-effect edit-product" data-productid="{{$all_new->Newt}}"
                                            ><i class="fas fa-pencil-alt"></i></button>
                                               @if (Auth::guard('admin')->user()->can('order.delete'))
                                                    <button type="button" onclick="deleteTag({{ $all_new->Newt}})" class="btn btn-danger waves-light waves-effect">
                                                        <i class="far fa-trash-alt"></i></button>
                                                    <form id="delete-form-{{ $all_new->Newt }}" action="{{ route('admin.order.destroy',$all_new->Newt) }}" method="POST" style="display: none;">

                                                        @csrf

                                                    </form>
                                                @endif
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
<!-- Modal -->
<div class="modal fade bd-example-modal-lg productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content p-3 modal-data">

      </div>
    </div>
  </div>
@endsection


@section('scripts')
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
          url:"{{route('admin.all_order_status_update')}}",
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
