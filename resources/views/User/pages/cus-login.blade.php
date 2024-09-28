@include('admin.layout.auth')
{{--@include('admin.layout.main-layout')--}}

<div class="auth-main v1 bg-grd-primary">
    <div class="auth-wrapper">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{asset('assets/images/logo3.png')}}" alt="images" class="img-fluid mb-4">
                        <h4 class="f-w-500 mb-1">Login with your email</h4>
                        <p class="mb-4">Don't have an Account? <a href="{{route('cus-registration')}}"
                                                                  class="link-primary ms-1">Create Account</a></p>
                    </div>
                    <form action="{{route('cus-login')}}" method="POST">
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
                            <input name="email" value="{{old('email')}}" type="email" class="form-control"
                                   id="floatingInput" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <input name="password" value="{{old('password')}}" type="password" class="form-control"
                                   id="floatingInput1" placeholder="Password">
                        </div>
                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                       checked="">
                                <label class="form-check-label text-muted" for="customCheckc1">Remember me?</label>
                            </div>
                            <a href="{{route('send-otp')}}"><h6 class="f-w-400 mb-0">Forgot Password?</h6></a>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
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

