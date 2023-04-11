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
                <div class="col-md-14 aside">
                    <h1 class="mb-3">Account Details</h1>
                    <div class="row vert-margin">
                        <div class="col-sm-9">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Personal Info</h3>
                                    <p><b>First Name:</b> {{ Auth::user()->name }}<br>
                                        <b>Last Name:</b> {{ Auth::user()->lname }}<br>
                                        <b>E-mail:</b> {{ Auth::user()->email }}<br>
                                        <b>Phone:</b> {{ Auth::user()->phone }}</p>
                                        <b>Reward Point:</b> {{ $total_reward_point*$product_quantity}}</p>
                                    <div class="mt-2 clearfix">
                                        <a href="#" class="link-icn js-show-form" data-form="#updateDetails"><i class="icon-pencil"></i>Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 d-none" id="updateDetails">
                        <form action="{{ route('customer_information_edit') }}" method ="post">
                            @csrf
                        <div class="card-body">
                            <h3>Update Account Details</h3>
                            <div class="row mt-2">
                                <div class="col-sm-9">
                                    <label class="text-uppercase">First Name:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control--sm" placeholder="Jenny" name="name" value="{{ Auth::user()->name }}">
                                        <input type="hidden" class="form-control form-control--sm" placeholder="Jenny" name="id" value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <label class="text-uppercase">Last Name:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control--sm" placeholder="Raider" name="lname" value="{{ Auth::user()->lname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-9">
                                    <label class="text-uppercase">E-mail:</label>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control--sm" placeholder="jennyraider@hotmail.com" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <label class="text-uppercase">Phone:</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control--sm" placeholder="876-432-4323" name="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="reset" class="btn btn--alt js-close-form" data-form="#updateDetails">Cancel</button>
                                <button type="submit" class="btn ml-1">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
