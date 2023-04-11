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
                                <h4 class="font-size-18">Product Profile</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="float-right d-md-block">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                        type="button" onclick="window.location.href='{{ route('admin.product.edit', $products->id) }}'">
                                        <i class="far fa-calendar-plus  mr-2"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-7">
                            <div class="card">
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-5">
                                            <table class="table table-borderless dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <tbody>
                                                @foreach($image_list as $imagenew)
                                                    <tr>
                                                        <td>
                                                            <img src="{{asset('/')}}{{'public/upload/'.$imagenew->image}}" alt=""
                                                                width="100%">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-7">
                                            <table class="table table-borderless dt-responsive nowrap"
                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                                                <tbody>
                                                    <tr>
                                                        <td>Product Name</td>
                                                        <td>{{$products->product_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td>{{$category_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SubCategory</td>
                                                        <td>{{$subcategory_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Brand Name</td>
                                                        <td>{{$brand_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Buying Price</td>
                                                        <td>{{$products->buy_price}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sale Price</td>
                                                        <td>{{$products->sell_price}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Unit</td>
                                                        <td>{{$products->unit}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Volume</td>
                                                        <td>{{$volume_name}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Reward Point Category</td>
                                                        <td>{{$reward_name}}</td>
                                                    </tr>



                                                    <tr>
                                                        <td>Reward Point </td>
                                                        <td>{{$products->reward_point_product_count}}</td>
                                                    </tr>



                                                    <tr>
                                                        <td>Discount Type</td>
                                                        <td>
                                                        
                                                        @if($products->discount_type == 1)
                                                        Percent
                                                        @else
Flat
                                                        @endif
                                                        
                                                        
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Discount Amount</td>
                                                        <td>{{$products->discount_amount}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Stocks Unit</td>
                                                        <td>{{$products->stock_unit}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alert Quantity Unit</td>
                                                        <td>{{$products->alert_quantity}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Website Visible</td>
                                                        <td>
                                                         @if($products->status == 1)
                                                        Yes
                                                        @else
No

                                                        @endif
                                                        
                                                        </td>
                                                    </tr>
                                                    <!--<tr>
                                                        <td>Expired Date</td>
                                                        <td>10/02/2022</td>
                                                    </tr>-->
                                                    <tr>
                                                        <td>Purchase Limit</td>
                                                        <td>{{$products->purchase_limit}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Supllier</td>
                                                        <td>{{$supplier_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Description</td>
                                                        <td>{!!$products->des!!}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Attribute Name</td>
                                                        <td>
                                                        
                                                        @foreach($des_list as $newDes)

                                                        <ul>
                                                        <li><b>Parent Description:</b> {{$newDes->pdes}}</li>
                                                        <li><b>Child Description:</b> {{$newDes->cdes}}</li>
                                                        </ul>
                                                       
                                                        
                                                        @endforeach
                                                        
                                                        
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SL.</th>
                                                <th>Customer</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Sokhina Begum</td>
                                                <td>1/12/2021</td>
                                                <td>Received</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary waves-light waves-effect"
                                                            onclick="window.location.href='product_profile.php'"><i
                                                                class="fa fa-eye"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Sokhina Begum</td>
                                                <td>1/12/2021</td>
                                                <td>Received</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary waves-light waves-effect"
                                                            onclick="window.location.href='product_profile.php'"><i
                                                                class="fa fa-eye"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sokhina Begum</td>
                                                <td>1/12/2021</td>
                                                <td>Received</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary waves-light waves-effect"
                                                            onclick="window.location.href='product_profile.php'"><i
                                                                class="fa fa-eye"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Sokhina Begum</td>
                                                <td>1/12/2021</td>
                                                <td>Received</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary waves-light waves-effect"
                                                            onclick="window.location.href='product_profile.php'"><i
                                                                class="fa fa-eye"></i></button>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->



                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
@endsection