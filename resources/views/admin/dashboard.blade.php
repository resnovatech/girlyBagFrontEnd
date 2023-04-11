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
                                <h4 class="font-size-18">Dashboard</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item active">Welcome to Inventory Management</li>
                                </ol>
                            </div>
                        </div>

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/01.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total User</h5>
                                        <h4 class="font-weight-medium font-size-24">1,685 <i class="mdi mdi-arrow-up text-success ml-2"></i></h4>

                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">From the beginning</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/02.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Total Certificate Print</h5>
                                        <h4 class="font-weight-medium font-size-24">52,368 <i class="mdi mdi-arrow-down text-danger ml-2"></i></h4>

                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">From the beginning</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/03.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Current Month Certificate</h5>
                                        <h4 class="font-weight-medium font-size-24">15.8 <i class="mdi mdi-arrow-up text-success ml-2"></i></h4>

                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">Since this month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="{{ asset('/') }}public/admindashboard/assets/images/services-icon/04.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50">Last Month Certificate</h5>
                                        <h4 class="font-weight-medium font-size-24">2436 <i class="mdi mdi-arrow-up text-success ml-2"></i></h4>

                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1">Since last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Monthly Certificate Print</h4>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div>
                                                <div id="chart-with-area" class="ct-chart earning ct-golden-section">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <p class="text-muted mb-4">This month</p>
                                                        <h3>34</h3>
                                                        <p class="text-muted mb-5">It will be as simple as in fact it will be occidental.</p>
                                                        <span class="peity-donut" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72">4/5</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-center">
                                                        <p class="text-muted mb-4">Last month</p>
                                                        <h3>253</h3>
                                                        <p class="text-muted mb-5">It will be as simple as in fact it will be occidental.</p>
                                                        <span class="peity-donut" data-peity='{ "fill": ["#02a499", "#f2f2f2"], "innerRadius": 28, "radius": 32 }' data-width="72" data-height="72">3/5</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                            </div>
                            <!-- end card -->
                        </div>

                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title mb-4">Certificate Analytics</h4>
                                    </div>
                                    <div class="wid-peity mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted">Charecter Certificate</p>
                                                    <h5 class="mb-4">1,542</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}' data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wid-peity mb-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted">Income Certificate</p>
                                                    <h5 class="mb-4">6,451</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}' data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted">Family Certificate</p>
                                                    <h5>4,574</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-4">
                                                    <span class="peity-line" data-width="100%" data-peity='{ "fill": ["rgba(2, 164, 153,0.3)"],"stroke": ["rgba(2, 164, 153,0.8)"]}' data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">User Gender Report</h4>

                                    <div class="cleafix">
                                        <p class="float-left"><i class="mdi mdi-calendar mr-1 text-primary"></i> Jan 01 - Dec 31</p>
                                        <h5 class="font-18 text-right">4230</h5>
                                    </div>

                                    <div id="ct-donut" class="ct-chart wid"></div>

                                    <div class="mt-4">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Male</td>
                                                    <td class="text-right">54.5%</td>
                                                </tr>
                                                <tr>
                                                    <td>Female</td>
                                                    <td class="text-right">28.0%</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Today's Activity</h4>
                                    <ol class="activity-feed">
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jan 22</span>
                                                <span class="activity-text">Charecter Certificate</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jan 22</span>
                                                <span class="activity-text">Income Certificate</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jan 22</span>
                                                <span class="activity-text">Charecter Certificate</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jan 22</span>
                                                <span class="activity-text">Family Certificate</span>
                                            </div>
                                        </li>
                                        <li class="feed-item">
                                            <div class="feed-item-list">
                                                <span class="date">Jan 22</span>
                                                <span class="activity-text">Emergency Certificate</span>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Latest Trasaction</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Transection ID</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col" colspan="2">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">#14257</th>
                                                    <td>16/1/2019</td>
                                                    <td>$112</td>
                                                    <td><span class="badge badge-warning">Pending</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#14256</th>
                                                    <td>15/1/2018</td>
                                                    <td>$94</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                </tr>

                                                <tr>
                                                    <th scope="row">#14258</th>
                                                    <td>17/1/2019</td>
                                                    <td>$116</td>
                                                    <td><span class="badge badge-success">Paid</span></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">#14259</th>
                                                    <td>18/1/2019</td>
                                                    <td>$109</td>
                                                    <td><span class="badge badge-danger">Cancel</span></td>

                                                </tr>
                                                <tr>
                                                    <th scope="row">#14260</th>

                                                    <td>19/1/2019</td>
                                                    <td>$120</td>
                                                    <td><span class="badge badge-success">Paid</span></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Latest Certificate Print</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Certificate Name</th>
                                                    <th scope="col">Edited</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Kuddus</td>
                                                    <td>15/1/2018</td>
                                                    <td>Charecter  Certificate</td>
                                                    <td>Karim</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Kuddus</td>
                                                    <td>15/1/2018</td>
                                                    <td>Charecter  Certificate</td>
                                                    <td>Karim</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Kuddus</td>
                                                    <td>15/1/2018</td>
                                                    <td>Charecter  Certificate</td>
                                                    <td>Karim</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>Kuddus</td>
                                                    <td>15/1/2018</td>
                                                    <td>Charecter  Certificate</td>
                                                    <td>Karim</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>Kuddus</td>
                                                    <td>15/1/2018</td>
                                                    <td>Charecter  Certificate</td>
                                                    <td>Karim</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Kuddus</td>
                                                    <td>15/1/2018</td>
                                                    <td>Charecter  Certificate</td>
                                                    <td>Karim</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->



                </div>
                <!-- container-fluid -->
            </div>
@endsection
