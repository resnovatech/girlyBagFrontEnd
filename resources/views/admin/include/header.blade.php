@php
     $usr = Auth::guard('admin')->user();
 @endphp
<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                    <img src="{{ asset('/') }}public/admindashboard/assets/images/logo-01.png" alt="" height="20">
                                </span>
                            <span class="logo-lg">
                                    <img src="{{ asset('/') }}public/admindashboard/assets/images/logo.png" alt="" height="30">
                                </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>


                </div>

                <div class="d-flex">


                    <div class="dropdown d-inline-block d-lg-none ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="mdi mdi-fullscreen"></i>
                            </button>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-danger badge-pill">3</span>
                            </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notifications (258) </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="javascript:void(0)">
                                        View all
                                    </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::guard('admin')->user()->image == NUll)
                                <img class="rounded-circle header-profile-user" src="{{asset('/')}}public/admindashboard/assets/images/users/user-4.jpg"
                                    alt="Header Avatar">
                        @else
                        <img src="{{asset('/')}}{{ Auth::guard('admin')->user()->image }}" width="48" height="48" alt="User" />
                        @endif
                            </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            @if ( $usr->can('profile.view') ||  $usr->can('profile.edit'))
                            <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>
                            @endif
                            <a class="dropdown-item" href="#"><i class="mdi mdi-wallet font-size-17 align-middle mr-1"></i> My Wallet</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="{{ route('admin.logout.submit') }}" onclick="event.preventDefault();
                      document.getElementById('admin-logout-form').submit();"><i class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i> Logout</a>
                       <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
        @csrf
    </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>