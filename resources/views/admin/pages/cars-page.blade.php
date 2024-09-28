@include('admin.layout.auth')
@include('admin.layout.main-layout')
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block card mb-0">
                <div class="card-header">
                    <div class="row align-items-center border-bottom pb-2 mb-2">
                        <div class="col-md-12 justify-content-between d-flex">
                            <div class="page-header-title">
                                <h4 class="mb-0">Manage Cars</h4>
                            </div>
                            <div>
                                <a href="{{route('car-create')}}" class="btn btn-sm rounded btn-primary">Add Car</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        @if (session('success'))
                            <div id="notification" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table">
                            <tr>
                                <th>Image</th>
                                <th>Car Name</th>
                                <th>Car Type</th>
                                <th>Price (Per day)</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($cars as $car)
                            <tr>
                                <td><img src="{{$car->image}}" alt="prod img" width="200px"  class="img-fluid"></td>
                                <td>{{$car->name}}</td>
                                <td>{{$car->car_type}}</td>
                                <td>{{$car->daily_rent_price}}</td>
                                <td><span class="badge bg-{{$car->availability == 'Available' ? 'success' : 'danger'}}">{{$car->availability}}</span></td>
                                <td>
                                    <a href="{{route('car-view', $car->id)}}" class="btn btn-primary btn-sm rounded">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

<script>
    // Hide the notification after 6 seconds
    setTimeout(function () {
        let notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'none';
        }
    }, 4000);  // 1000ms = 1 seconds
</script>
