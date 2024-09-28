@include('admin.layout.auth')
<div class="auth-main v1 bg-grd-primary">
    <div class="auth-wrapper">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{asset('assets/images/logo3.png')}}" alt="images" class="img-fluid mb-4">
                        <h4 class="f-w-500 mb-1">Register with your email</h4>
                        <p class="mb-4">Already have an Account? <a href="/cus-login" class="link-primary">Log in</a></p>
                    </div>

                    <div class="row">
                        <form action="{{route('admin-register')}}" method="POST">
                            @csrf
                            @if($errors->any())
                                <div id="notification">
                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            <span>{{$error}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="form-group mb-3">
                                <input name="name" value="{{old('name')}}" type="text" class="form-control"
                                       placeholder="Name">
                            </div>
                            <div class="form-group mb-3">
                                <input name="email" value="{{old('email')}}" type="email" class="form-control"
                                       placeholder="Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <input name="password" value="{{old('password')}}" type="password" class="form-control"
                                       placeholder="Password">
                            </div>
                            <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                           checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">I agree to all the
                                        Terms & Condition</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

</div>
{{--    js for notification start--}}
<script>
    // Hide the notification after 6 seconds
    setTimeout(function () {
        let notification = document.getElementById('notification');
        if (notification) {
            notification.style.display = 'none';
        }
    }, 4000);  // 1000ms = 1 seconds
</script>

