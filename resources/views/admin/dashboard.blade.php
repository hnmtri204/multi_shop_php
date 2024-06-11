@extends('admin.layout')

@section('content')
<!-- wrapper  -->
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">E-commerce Dashboard </h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="ecommerce-widget">

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Total Revenue</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">$ {{$total}} </h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Product</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{ $countPro }}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            </div>
                        </div>
                        <div id="sparkline-revenue2"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted">Orders</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{ $countOrd }}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                <span>N/A</span>
                            </div>
                        </div>
                        <div id="sparkline-revenue3"></div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-muted"> Order Paid</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{ $orderPaid }}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                            </div>
                        </div>
                        <div id="sparkline-revenue4"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- ============================================================== -->

                <!-- ============================================================== -->

                <!-- recent orders  -->
                <!-- ============================================================== -->
                <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Recent Orders</h5>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">Order Id</th>
                                            <th class="border-0">Product Image</th>
                                            <th class="border-0">Product Name</th>
                                            <th class="border-0">Quantity</th>
                                            <th class="border-0">Price</th>
                                            <th class="border-0">Order Time</th>
                                            <th class="border-0">Customer</th>
                                            <th class="border-0">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderShow->groupBy('order_id') as $orders)
                                        <tr>
                                            <td rowspan="{{ $orders->count() }}">{{ $orders->first()->order_id }}</td>
                                            @foreach($orders as $order)
                                            <td><img src="{{ asset('storage/'.$order->product->img) }}" style="width: 50px; height: 50px;" alt=""></td>
                                            <td>{{ $order->product->name }}</td>
                                            <td>{{ $order->product->quantity }}</td>
                                            <td>${{ $order->product->price }}</td>
                                            <td>{{ $order->order->created_at }}</td>
                                            <td>{{ $order->order->user_id }}</td>
                                            <td><span class="badge-dot badge-brand mr-1"></span>{{ $order->order->status }}</td>
                                        </tr>
                                        <tr>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end recent orders  -->


                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- customer acquistion  -->
                <!-- ============================================================== -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Customer Acquisition</h5>
                        <div class="card-body">
                            <div class="ct-chart ct-golden-section" style="height: 354px;"></div>
                            <div class="text-center">
                                <span class="legend-item mr-2">
                                    <span class="fa-xs text-primary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">Returning</span>
                                </span>
                                <span class="legend-item mr-2">

                                    <span class="fa-xs text-secondary mr-1 legend-tile"><i class="fa fa-fw fa-square-full"></i></span>
                                    <span class="legend-text">First Time</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end customer acquistion  -->
                <!-- ============================================================== -->
            </div>


            <!--  -->


        </div>
    </div>
</div>

<!-- end wrapper  -->
@endsection