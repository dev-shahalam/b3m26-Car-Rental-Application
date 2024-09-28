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
                                <h4 class="mb-0">Create A New Car</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <form enctype="multipart/form-data" action="{{route('car-create')}}" method="post">
                        @csrf
                        <div class="container">
                            <div class="row">
                                @if(session('error'))
                                    <div id="notification" class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div id="notification">
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{$error}}
                                        </div>
                                    @endforeach
                                    </div>
                                @endif

                                <div class="col-12 p-1">
                                    <label class="form-label mt-2">Car Name</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label mt-2">Brand</label>
                                    <input type="text" class="form-control" name="brand" value="{{old('brand')}}">
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label mt-2">Model</label>
                                    <input type="text" class="form-control" name="model" value="{{old('model')}}">
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label mt-2">Year of Manufacture</label>
                                    <input type="text" class="form-control" name="year" value="{{old('year')}}">
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label mt-2">Car Type</label>
                                    <select class="form-select" name="car_type" value="{{old('car_type')}}">
                                        <option selected>Select Car Type</option>
                                        <option >Sedans</option>
                                        <option>Hatchbacks</option>
                                        <option>SUVs</option>
                                        <option>Hybrids</option>
                                        <option>Luxury</option>
                                        <option>Crossovers</option>
                                    </select>
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label mt-2">Daily Rent Price</label>
                                    <input type="text" class="form-control" name="daily_rent_price" value="{{old('daily_rent_price')}}">
                                </div>
                                <div class="col-6 p-1">
                                    <label class="form-label mt-2">Availability Status</label>
                                    <select class="form-select" name="availability" value="{{old('availability')}}">
                                        <option selected>Select Car Status</option>
                                        <option >Available</option>
                                        <option > Not Available</option>
                                        </select>
                                </div>

                                <div class="col-3 p-1">
                                    <img class="w-10 img-fluid" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                    <br/>
                                    <label class="form-label">Image</label>
                                    <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file"
                                           class="form-control" name="image" value="{{old('image')}}">
                                </div>
                                <div class="col-12 p-1 text-center">
                                    <button type="submit" class="btn btn-sm rounded btn-primary w-25">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
