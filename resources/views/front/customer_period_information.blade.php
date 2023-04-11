@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection




@section('body')
<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><span>My Period Information</span></li>
            </ul>
        </div>
    </div>
    <div class="holder">
        <div class="container">
            <div class="row">
                <div class="col-md-4 aside aside--left">
                    <div class="list-group">
                        @include('customerSidebar')
                    </div>
                </div>

                @if(empty($periodHistory))

                <div class="col-md-14 aside">
                    <h1 class="mb-3">My Period Information</h1>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card">

                                <div class="card-body">
                                    <h3>Information</h3>
                                    <p>Not Available</p>

                                </div>

                            </div>
                        </div>
                        <!--<div class="col-sm-9 mt-2 mt-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Address 2</h3>
                                    <p>Yuto Murase 42 1
                                        <br> Motohakone Hakonemaci Ashigarashimo
                                        <br> Gun Kanagawa 250 05 JAPAN
                                    </p>
                                    <div class="mt-2 clearfix">
                                        <a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                                        <a href="#" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>

                </div>

                @else
                <div class="col-md-14 aside">
                    <h1 class="mb-3">My Period Information</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-order-history">
                            <thead>
                            <tr>

                                <th scope="col">Period Date</th>
                                <th scope="col">Total Days</th>
                                <th scope="col">Cycle</th>
                                <th scope="col">Update Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($periodHistory as $newOrder)
                            <tr>

                                <td>{{ $newOrder->period_date }}</td>
                                <td>{{ $newOrder->total_days }}</td>

                                <td>{{ $newOrder->cycle }}</td>
                                <td>{{ $newOrder->update_date }}</td>
                                <td>

                                    @if($newOrder->status == 1)
                                    Input Data
                                    @else
                                   Prediction Data
                                @endif


                                </td>
                             <td>

                                <?php

                                 $Periodmonth = date('m',strtotime($newOrder->period_date));
                                 $Currentmonth = date('m',strtotime(date('Y-m-d')));

                                    ?>
                                    @if($Periodmonth == $Currentmonth)


                                    @if($newOrder->status == 1)

@if(empty($newOrder->update_date))
        <button  class="btn btn-sm btn-primary view-product"  data-productid="{{$newOrder->id}}">Update Input Data</button>
        @else

        @endif

@else

@if(empty($newOrder->update_date))
<button  class="btn btn-sm btn-primary view-productPrediction"  data-productid="{{$newOrder->id}}">Update Prediction Data</button>
@endif
@endif



                                    @else


                                    @endif

                                </td>
                            </tr>
                           @endforeach

                            </tbody>
                        </table>
                    </div>


                        <!--<div class="col-sm-9 mt-2 mt-sm-0">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Address 2</h3>
                                    <p>Yuto Murase 42 1
                                        <br> Motohakone Hakonemaci Ashigarashimo
                                        <br> Gun Kanagawa 250 05 JAPAN
                                    </p>
                                    <div class="mt-2 clearfix">
                                        <a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                                        <a href="#" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    <div class="card mt-3 d-none" id="updateAddress">

                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


 <!-- Modal -->
 <div class="modal fade productModal " style="margin-top: 5%;" tabindex="-1" role="dialog"
 aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content p-3 modal-data">


    </div>
</div>
</div>

@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            //edit product
            $(".view-product").click(function () {
                var productid = $(this).data('productid');
                //ajax
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('period_information_update_input_list')}}",
                    type: "POST",
                    data: {
                        'productid': productid
                    },
                    //dataType:'json',
                    success: function (data) {
                        $(".modal-data").html(data);
                        $('.productModal').modal('show');
                    },
                    error: function () {
                        toastr.error("Something went Wrong, Please Try again.");
                    }
                });

                //end ajax
            });

        });

</script>


<script>
    $(document).ready(function () {
        //edit product
        $(".view-productPrediction").click(function () {
            var productid = $(this).data('productid');
            //ajax
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('period_information_update_prediction_list')}}",
                type: "POST",
                data: {
                    'productid': productid
                },
                //dataType:'json',
                success: function (data) {
                    $(".modal-data").html(data);
                    $('.productModal').modal('show');
                },
                error: function () {
                    toastr.error("Something went Wrong, Please Try again.");
                }
            });

            //end ajax
        });

    });

</script>

@endsection
