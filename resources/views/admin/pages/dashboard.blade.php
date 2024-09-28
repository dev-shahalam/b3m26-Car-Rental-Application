@include('admin.layout.auth')
@include('admin.layout.main-layout')

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ Main Content ] start -->
        <div class="row" id="main-content">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-primary order-card">
                    <div class="card-body">
                        <h4 class="text-white text-center">Total Cars</h4>
                        <h2 class="text-center text-white"><span>{{$total_car}}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-success order-card">
                    <div class="card-body">
                        <h4 class="text-white text-center">Available Cars</h4>
                        <h2 class="text-center text-white"><span>{{$available_car}}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-warning order-card">
                    <div class="card-body">
                        <h4 class="text-white text-center">Total Rentals</h4>
                        <h2 class="text-center text-white"><span>{{$total_car}}</span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card bg-grd-danger order-card">
                    <div class="card-body">
                        <h4 class="text-white text-center">Total Earnings </h4>
                        <h2 class="text-center text-white"><span>{{$total_car}}</span>
                        </h2>
                    </div>
                </div>
            </div>


            <!-- Recent Rentals start -->
            <div class="col-sm-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Recent Orders</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Image</th>
                                    <th>Product Code</th>
                                    <th>Customer</th>
                                    <th>Purchased On</th>
                                    <th>Status</th>
                                    <th>Transaction ID</th>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/images/widget/p1.jpg')}}" alt="prod img"
                                             class="img-fluid"></td>
                                    <td>PNG002413</td>
                                    <td>Jane Elliott</td>
                                    <td>06-01-2017</td>
                                    <td><span class="badge bg-primary">Shipping</span></td>
                                    <td>#7234421</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/images/widget/p2.jpg')}}" alt="prod img"
                                             class="img-fluid"></td>
                                    <td>PNG002344</td>
                                    <td>John Deo</td>
                                    <td>05-01-2017</td>
                                    <td><span class="badge bg-danger">Failed</span></td>
                                    <td>#7234486</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/images/widget/p3.jpg')}}" alt="prod img"
                                             class="img-fluid"></td>
                                    <td>PNG002653</td>
                                    <td>Eugine Turner</td>
                                    <td>04-01-2017</td>
                                    <td><span class="badge bg-success">Delivered</span></td>
                                    <td>#7234417</td>
                                </tr>
                                <tr>
                                    <td><img src="{{asset('assets/images/widget/p4.jpg')}}" alt="prod img"
                                             class="img-fluid"></td>
                                    <td>PNG002156</td>
                                    <td>Jacqueline Howell</td>
                                    <td>03-01-2017</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>#7234454</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recent Orders end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<!-- [ Main Content ] end -->
