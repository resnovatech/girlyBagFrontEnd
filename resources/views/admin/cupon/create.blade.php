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
                    <h4 class="font-size-18">Add New Product</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Resnova</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Add New Product</li>
                    </ol>
                </div>
            </div>

        </div>
        <!-- end page title -->
        <form action="{{ route('admin.cupon.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-title-desc">Please Fill Up The Form Carefully</p>

                            <div class="row">

                                <div class="form-group col-lg-6">
                                    <label>Coupon Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>



                                <div class="form-group col-lg-6">
                                    <label>Coupon Code</label>
                                    <input type="text" class="form-control" name="code">
                                </div>

                                <!--<div class="form-group col-lg-6">
                                    <label class="control-label">For first order only?</label>
                                    <select class="form-control select2" name="first_order_only">
                                        <option>Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>-->

                                <div class="form-group col-lg-6">
                                    <label>Active From</label>
                                    <input type="date" class="form-control" name="active_from">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Active To</label>
                                    <input type="date" class="form-control" name="active_to">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label class="control-label">Discount Type</label>
                                    <select class="form-control select2" name="discount_type">
                                        <option>Select</option>
                                        <option value="0">Fixed</option>
                                        <option value="1">Percentage</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Discount Amount</label>
                                    <input type="number" class="form-control" name="discount_amount">
                                </div>

                               <!-- <div class="form-group col-lg-6">
                                    <label>Maximum Purchase Amount </label>
                                    <input type="number" class="form-control" name="maximum_purchase_amount">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Minimum Purchase Discount </label>
                                    <input type="number" class="form-control" name="mimimum_purchase_discount">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Usage Limit By Single Customer </label>
                                    <input type="number" class="form-control" name="usage_limit">
                                </div>-->


                            </div>

                        </div>
                    </div>

                </div> <!-- end col -->

                <div class="col-lg-12">
                    <div class="float-right d-none d-md-block">
                        <div class="form-group mb-4">
                            <div>
                                <button type="submit"
                                    class="btn btn-primary btn-lg  waves-effect waves-light mr-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary btn-lg  waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>



            </div> <!-- end row -->
        </form>


    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection
