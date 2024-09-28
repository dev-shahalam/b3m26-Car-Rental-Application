@include('admin.layout.auth')

<div class="auth-main v1 bg-grd-primary">
    <div class="auth-wrapper">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{asset('assets/images/logo3.png')}}" alt="images" class="img-fluid mb-4">
                        <h4 class="f-w-500 mb-3">Reset your password</h4>
                    </div>
                    <form action="{{route('send-otp')}}" method="POST">
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
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary">Send OTP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->

