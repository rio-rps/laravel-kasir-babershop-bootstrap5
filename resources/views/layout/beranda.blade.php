@extends('layout.main')


@section('isi')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="left-content">
        <div>
            <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, {{ $user->name }} !</h2>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row -->
<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-primary-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">TODAY ORDERS</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">12 Orders</h4>
                            <p class="mb-0 tx-12 text-white op-7">Compared to Yesterday</p>
                        </div>
                        <span class="float-end my-auto ms-auto">
                            <i class="fas fa-arrow-circle-up text-white"></i>
                            <span class="text-white op-7"> +27</span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-success-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">TOTAL EARNINGS</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">Rp. 3.000.000</h4>
                            <p class="mb-0 tx-12 text-white op-7">Compared to Yesterday</p>
                        </div>
                        <span class="float-end my-auto ms-auto">
                            <i class="fas fa-arrow-circle-up text-white"></i>
                            <span class="text-white op-7"> 52.09%</span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
        <div class="card overflow-hidden sales-card bg-warning-gradient">
            <div class="px-3 pt-3  pb-2 pt-0">
                <div class="">
                    <h6 class="mb-3 tx-12 text-white">PRODUCT SOLD</h6>
                </div>
                <div class="pb-0 mt-0">
                    <div class="d-flex">
                        <div class="">
                            <h4 class="tx-20 fw-bold mb-1 text-white">$4,820.50</h4>
                            <p class="mb-0 tx-12 text-white op-7">Compared to last week</p>
                        </div>
                        <span class="float-end my-auto ms-auto">
                            <i class="fas fa-arrow-circle-down text-white"></i>
                            <span class="text-white op-7"> -152.3</span>
                        </span>
                    </div>
                </div>
            </div>
            <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
        </div>
    </div>
</div>
<!-- row closed -->



<!-- row opened -->
<div class="row row-sm row-deck">
    <div class="col-md-12 col-lg-4 col-xl-4">
        <div class="card card-dashboard-eight pb-2">
            <h6 class="card-title">Your Top Countries</h6><span class="d-block mg-b-10 text-muted tx-12">Sales performance revenue based by country</span>
            <div class="list-group border-top-0">
                <div class="list-group-item border-top-0" id="br-t-0">
                    <i class="flag-icon flag-icon-us flag-icon-squared"></i>
                    <p>United States</p><span>$1,671.10</span>
                </div>
                <div class="list-group-item">
                    <i class="flag-icon flag-icon-nl flag-icon-squared"></i>
                    <p>Netherlands</p><span>$1,064.75</span>
                </div>
                <div class="list-group-item">
                    <i class="flag-icon flag-icon-gb flag-icon-squared"></i>
                    <p>United Kingdom</p><span>$1,055.98</span>
                </div>
                <div class="list-group-item">
                    <i class="flag-icon flag-icon-ca flag-icon-squared"></i>
                    <p>Canada</p><span>$1,045.49</span>
                </div>
                <div class="list-group-item">
                    <i class="flag-icon flag-icon-in flag-icon-squared"></i>
                    <p>India</p><span>$1,930.12</span>
                </div>
                <div class="list-group-item border-bottom-0 mb-0">
                    <i class="flag-icon flag-icon-au flag-icon-squared"></i>
                    <p>Australia</p><span>$1,042.00</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-8 col-xl-8">
        <div class="card card-table-two">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-1">Your Most Recent Earnings</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <span class="tx-12 tx-muted mb-3 ">This is your most recent earnings for today's date.</span>
            <div class="table-responsive country-table">
                <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                    <thead>
                        <tr>
                            <th class="wd-lg-25p">Date</th>
                            <th class="wd-lg-25p tx-right">Sales Count</th>
                            <th class="wd-lg-25p tx-right">Earnings</th>
                            <th class="wd-lg-25p tx-right">Tax Witheld</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>05 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">$658.20</td>
                            <td class="tx-right tx-medium tx-danger">-$45.10</td>
                        </tr>
                        <tr>
                            <td>06 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">26</td>
                            <td class="tx-right tx-medium tx-inverse">$453.25</td>
                            <td class="tx-right tx-medium tx-danger">-$15.02</td>
                        </tr>
                        <tr>
                            <td>07 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">34</td>
                            <td class="tx-right tx-medium tx-inverse">$653.12</td>
                            <td class="tx-right tx-medium tx-danger">-$13.45</td>
                        </tr>
                        <tr>
                            <td>08 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">45</td>
                            <td class="tx-right tx-medium tx-inverse">$546.47</td>
                            <td class="tx-right tx-medium tx-danger">-$24.22</td>
                        </tr>
                        <tr>
                            <td>09 Dec 2019</td>
                            <td class="tx-right tx-medium tx-inverse">31</td>
                            <td class="tx-right tx-medium tx-inverse">$425.72</td>
                            <td class="tx-right tx-medium tx-danger">-$25.01</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection