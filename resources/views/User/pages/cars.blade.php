{{--@include('layout.user-layout')--}}
@extends('user.layout.user-layout')
@section('content')
    <!-- Car categories Start -->
    <div class="container-fluid categories py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Vehicle <span class="text-primary">Categories</span></h1>
                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo expedita
                    asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate! Adipisci facilis
                    modi quisquam quia distinctio,
                </p>
            </div>

            <div class="row">
                @foreach($cars as $car)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="categories-img rounded-top">
                                <img src="{{$car->image}}" class="img-fluid w-100 h-70 rounded-top" alt="">
                            </div>
                            <div class="categories-content rounded-bottom p-4">
                                <h4>{{$car->name}}</h4>
                                <div class="categories-review mb-4">
                                    <div class="me-3">4.5 Review</div>
                                    <div class="d-flex justify-content-start text-secondary">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star text-body"></i>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <h5 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">{{$car->daily_rent_price}}
                                        BDT/Day</h5>
                                </div>
                                <a href="/" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Book
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
        <!-- Car categories End -->

        <!-- Car Steps Start -->
        <div class="container-fluid steps py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                    <h1 class="display-5 text-capitalize text-white mb-3">Cental<span
                            class="text-primary"> Process</span></h1>
                    <p class="mb-0 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut amet nemo
                        expedita asperiores commodi accusantium at cum harum, excepturi, quia tempora cupiditate!
                        Adipisci facilis modi quisquam quia distinctio,
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="steps-item p-4 mb-4">
                            <h4>Come In Contact</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolorem!</p>
                            <div class="setps-number">01.</div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="steps-item p-4 mb-4">
                            <h4>Choose A Car</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolorem!</p>
                            <div class="setps-number">02.</div>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="steps-item p-4 mb-4">
                            <h4>Enjoy Driving</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, dolorem!</p>
                            <div class="setps-number">03.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Car Steps End -->

        <!-- Banner End -->

@endsection
