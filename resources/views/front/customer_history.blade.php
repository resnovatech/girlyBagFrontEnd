@extends('front.master.page-master')


@section('title')
The GirlyBag

@endsection




@section('body')

<div class="page-content">
    <div class="holder breadcrumbs-wrap mt-0">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="index.html">Home</a></li>
                <li><span>My account</span></li>
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
                <div class="col-md-14 aside">
                    <h1 class="mb-3">Order History</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-order-history">
                            <thead>
                            <tr>
                                <th scope="col"># </th>
                                <th scope="col">Order Number</th>
                                <th scope="col">Order Date </th>
                                <th scope="col">Status</th>
                                <th scope="col">Total Price</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($order_history as $newOrder)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td><b>{{ $newOrder->pin }}</b> <!--<a href="cart.html" class="ml-1">View Details</a>--></td>
                                <td>{{ $newOrder->date }}</td>
                                <td>
                                    @if($newOrder->status == 0)

                                   Pending
                                    @elseif($newOrder->status == 1)
                                    Confirmed
                                    @else
Processing
                                    @endif
                                </td>
                                <td><span class="color">${{ $newOrder->order_total }}</span></td>
                                <td><!--<a href="#" class="btn btn--grey btn--sm">REORDER</a>--></td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mt-2">
                        <!--<a href="#" class="btn btn--alt">Clear History</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
