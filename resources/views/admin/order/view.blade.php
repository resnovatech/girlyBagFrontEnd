@extends('admin.master.master')
@section('title')
Order Information
@endsection


@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Order Information</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                        <li class="breadcrumb-item active">Manage All Order</li>
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
             <div class="card">
              <div class="card-header">
                <h4 class="card-title">Order From {{ $order->Username }} </>
                  @if($order->status == 0)
                  <span class="badge badge-warning">Pending</span>
                  @elseif($order->status == 1)
                  <span class="badge badge-primary">Confirmed</span>
                  @elseif($order->status == 2)
                  <span class="badge badge-info">Processing</span>
                  @elseif($order->status == 3)
                  <span class="badge badge-danger">Cancelled</span>
                  @elseif($order->status == 4)
                  <span class="badge badge-success">Delivared</span>
                  @endif
                </h4>
              </div>
              <!-- /.card-header -->

            </div>
            <!-- /.card -->
          </div>
        </div>

        <div class="row">
          <div class="col-6">
           <div class="card">
            <div class="card-header">
              <h4 class="card-title">Customer Information</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <ul>
                <li><b>Name:</b> {{ $order->Username }}</li>
                <!-- <li><b>Phone:</b> {{ $order->Userphone }}</li> -->
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-6">
         <div class="card">
          <div class="card-header">
            <h3 class="card-title">Shipping Information</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <ul>
              <li><b>Name:</b> {{ $order->Fname.' '.$order->lname }}</li>
              <li><b>Phone:</b> {{ $order->phone }}</li>

              <li><b>Address:</b> {{ $order->address }}</li>
              <li><b>Order Comment:</b> {{ $order->order_comment }}</li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      </div>

      <div class="row">
        <div class="col-12">
         <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Information</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Item Name</th>
                  <th>Item Quantity</th>

                  <th>Item Price</th>
                  <th>Item sub-total</th>

                </tr>
              </thead>
              <tbody>
               @foreach($details as $key=>$category)
               <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $category->product_name }} </td>
                <td>{{ $category->product_quantity }} </td>

                <td>
                  {{ $category->product_price }}
                </td>
                <td>{{ $category->order_total }}</td>
              </tr>
              @endforeach
            </tbody>


          </table>
          <h5 class="text-left" > Total Price: {{ $order->order_total }}</h5>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->
    </div>
    </div>



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
@endsection
