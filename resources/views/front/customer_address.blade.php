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

                @if(empty($new_add))

                <div class="col-md-14 aside">
                    <h1 class="mb-3">My Addresses</h1>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card">

                                <div class="card-body">
                                    <h3>Address 1 (Default)</h3>
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
                    <h1 class="mb-3">My Addresses</h1>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="card">

                                <div class="card-body">
                                    <h3>Address 1 (Default)</h3>
                                    <p>{{ $new_add->Fname }} {{ $new_add->lname }}
                                        <br> {{ $new_add->phone }}
                                        <br> {{ $new_add->address }}</p>
                                    <div class="mt-2 clearfix">
                                        <a href="#" class="link-icn js-show-form" data-form="#updateAddress"><i class="icon-pencil"></i>Edit</a>
                                        <!--<a href="#" class="link-icn ml-1 float-right"><i class="icon-cross"></i>Delete</a>-->
                                    </div>
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
                    <div class="card mt-3 d-none" id="updateAddress">
                        <form action="{{ route('customer_addresss_edit') }}" method="post">
                            @csrf
                        <div class="card-body">
                            <h3>Edit Address</h3>
                            <label class="text-uppercase">Country:</label>
                            <div class="form-group select-wrapper">
                                <select class="form-control" name="country">
                                    <option value="Bangladesh">Banglades</option>

                                </select>
                            </div>
                            <label class="text-uppercase">District:</label>
                            <div class="form-group select-wrapper">
                                <select class="form-control" name="dis">
                                    <option value="Dhaka">Dhaka</option>

                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="text-uppercase">Phone:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" value="{{ $new_add->phone }}">
                                        <input type="hidden" class="form-control" name="id" value="{{ $new_add->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="text-uppercase">Address:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="address" value="{{ $new_add->address }}">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="reset" class="btn btn--alt js-close-form" data-form="#updateAddress">Cancel</button>
                                <button type="submit" class="btn ml-1">Update Address</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
