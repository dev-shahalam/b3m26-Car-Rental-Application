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
                                <h4 class="mb-0">Manage Customers</h4>
                            </div>
                            <div>
{{--                                <a href="{{route('customer-create')}}" class="btn btn-sm rounded btn-primary">Add Customer</a>--}}
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
                                <th>Customer Name</th>
                                <th> Customer Email</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($users as $customer)
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                               <td>
{{--                                    <a href="{{route('customer-view', $car->id)}}" class="btn btn-primary btn-sm rounded">View</a>--}}
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
