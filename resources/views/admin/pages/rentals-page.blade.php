@include('admin.layout.auth')
@include('admin.layout.main-layout')
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block card mb-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title border-bottom pb-2 mb-2">
                                <h4 class="mb-0">Rental Page</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Name: {{ $customer['name'] }}</h3>
                        <button class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile">
                            <i class="bi bi-pencil-square"></i> Edit Profile
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Email:</strong> {{ $customer['email'] }}</p>
                                <p><strong>Phone:</strong> {{ $customer['phone'] }}</p>
                                <p><strong>Address:</strong> {{ $customer['address'] }}</p>
                                <p><strong>Total Rentals:</strong> {{ $customer['total_rentals'] }}</p>
                                <p><strong>Total Spent:</strong> ${{ number_format($customer['total_spent'], 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>

        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0 text-white">Rental History</h4>
            </div>
            <div class="card-body">
                @if (empty($rentals))
                    <div class="alert alert-warning" role="alert">
                        <strong>No Rentals Found!</strong> This customer has not made any rentals yet.
                    </div>
                @else
                    <table class="table table-striped table-hover table-bordered" id="rentalTable">
                        <thead class="table-dark">
                        <tr>
                            <th>Rental ID</th>
                            <th>Car</th>
                            <th>Brand</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rentals as $rental)
                            <tr>
                                <td>{{ $rental['id'] }}</td>
                                <td>{{ $rental['car_name'] }}</td>
                                <td>{{ $rental['brand'] }}</td>
                                <td>{{ $rental['start_date'] }}</td>
                                <td>{{ $rental['end_date'] }}</td>
                                <td>${{ number_format($rental['total_cost'], 2) }}</td>
                                <td>
                                    @if ($rental['status'] === 'Ongoing')
                                        <span class="badge bg-success">Ongoing</span>
                                    @elseif ($rental['status'] === 'Completed')
                                        <span class="badge bg-secondary">Completed</span>
                                    @else
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#rentalDetails{{ $rental['id'] }}">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                    @if ($rental['status'] === 'Pending')
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel Booking">
                                            <i class="bi bi-x-circle"></i> Cancel
                                        </button>
                                    @endif
                                </td>
                            </tr>

                            <!-- Rental Details Modal -->
                            <div class="modal fade" id="rentalDetails{{ $rental['id'] }}" tabindex="-1" aria-labelledby="rentalDetailsLabel{{ $rental['id'] }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rentalDetailsLabel{{ $rental['id'] }}">Rental Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Car:</strong> {{ $rental['car_name'] }}</p>
                                            <p><strong>Brand:</strong> {{ $rental['brand'] }}</p>
                                            <p><strong>Start Date:</strong> {{ $rental['start_date'] }}</p>
                                            <p><strong>End Date:</strong> {{ $rental['end_date'] }}</p>
                                            <p><strong>Total Cost:</strong> ${{ number_format($rental['total_cost'], 2) }}</p>
                                            <p><strong>Status:</strong> {{ $rental['status'] }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->

<script>
    // Initialize Bootstrap tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
