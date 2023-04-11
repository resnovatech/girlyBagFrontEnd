@extends('admin.master.master')

@section('title')
Receive Order
@endsection



@section('body')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4 class="font-size-18">Invoice Generate</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">New Invoice</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice preview</a></li>
                        <li class="breadcrumb-item active">Invoice Generate</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="card">
            <div class="card-body">
                <div class="button-items justify-content-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light"><i
                                class="fas fa-pen"></i> Edit Invoice
                    </button>

                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal"
                            data-target=".bs-example-modal-lg"><i class="fas fa-money-bill"></i> Order Status
                    </button>
                    <button type="button" class="btn btn-info waves-effect waves-light"><i
                                class="fas fa-print"></i> Print
                    </button>
                    <button type="button" class="btn btn-warning waves-effect waves-light"><i
                                class="fas fa-envelope"></i> Email
                    </button>
                    <button type="button" class="btn btn-dark waves-effect waves-light"><i
                                class="fas fa-envelope"></i> SMS
                    </button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <div class="card-body ">
                            <img src="{{ asset('/') }}public/admindashboard/assets/images/logo.png" alt="" width="200px" height="50px">
                        </div>
                    </div>
                    <div class="col-lg-6" style="text-align:right;">
                        <div class="card-body">
                            <h3>INVOICE</h3>
                           <!-- <h5>SRN #1083</h5>-->
                            <h5>Gross Amount</h5>
                            <h4>{{ $order->order_total }} Taka</h4>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card-body">
                            <h5>Bill To</h5>
                            <h3>{{ $order->Fname.' '.$order->lname }} </h3>
                            <p>{{ $order->address }} <br>
                                Phone: {{ $order->phone }}<br>

                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 my-auto">
                        <div class="card-body">
                            <p>Invoice Date:

                              {{ $order->updated_at }}

                            </p>
                            <!--<p>Due Date: 16/02/2021</p>
                            <p>Terms: Payment Due On Reciept</p>-->
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Rate</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($details as $newd)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $newd->product_name }}</td>
                                        <td>$ {{ $newd->product_price }}</td>
                                        <td>{{ $newd->product_quantity }}</td>
                                        <td>0</td>
                                        <td>{{ $newd->product_quantity*$newd->product_price }}</td>
                                    </tr>
                                  @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="card-body">
                            <h4>Order Status: Recieved</h4>
                            <h4>Payment Method: COD</h4>
                            <h4>Order Recieved From: Web</h4>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="card-body">
                            <h4 class="card-title">Summary</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>$ {{ $newd->order_total }}</td>
                                    </tr>
                                    <tr>
                                        <td>Discount</td>
                                        <td>$ 0</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$ 0.00</td>
                                    </tr>
                                    <tr style="font-weight:bold">
                                        <td>Total</td>
                                        <td>$ {{ $newd->order_total }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myLargeModalLabel">Payment Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Amount</label>
                                    <div>
                                        <div class="input-group">
                                            <input type="number" class="form-control" value="780">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i
                                                            class="fas fa-dollar-sign"></i></span>
                                            </div>
                                        </div><!-- input-group -->
                                    </div>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>date</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Payment Method</label>
                                    <input type="text" value="COD" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Order Status</label>
                                    <select class="form-control" name="" id="">
                                        <option value="">Recieved</option>
                                        <option value="">Processing</option>
                                        <option value="">Delivered</option>
                                        <option value="">Cancel</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Note</label>
                                    <input type="text" class="form-control">
                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection
