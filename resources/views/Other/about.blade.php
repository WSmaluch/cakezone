@extends('main')

@section('content')
 <!-- About Start -->
 <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">About Us</h2>
                <h1 class="display-4 text-uppercase">Welcome To CakeZone</h1>
            </div>
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <h4 class="mb-4">We Make Delicious Cakes</h4>
                    <p class="mb-5">At CakeZone, we are passionate about creating mouth-watering cakes for every occasion. Our team of expert bakers uses the finest ingredients to bake delicious cakes that will leave you craving for more. Whether it's a birthday, wedding, or any special celebration, we have the perfect cake to make your day extra special.</p>
                    <div class="row g-5">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-heartbeat fa-2x text-white"></i>
                            </div>
                            <h4 class="text-uppercase">100% Healthy</h4>
                            <p class="mb-0">We prioritize your health and well-being. That's why we ensure that our cakes are made with the highest quality and healthy ingredients. You can indulge in our cakes without any guilt, as we believe in offering a perfect blend of taste and health.</p>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-award fa-2x text-white"></i>
                            </div>
                            <h4 class="text-uppercase">Award Winning</h4>
                            <p class="mb-0">Our dedication to excellence has been recognized with numerous awards. We take pride in our craftsmanship and strive to deliver cakes that not only taste amazing but also look stunning. When you choose CakeZone, you can trust that you are getting an award-winning cake for your special occasion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection