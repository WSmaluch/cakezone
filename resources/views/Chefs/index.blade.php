@extends('main')
@section('content')
<div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Master Chefs</h1>
                <a href="{{ url('/') }}">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Master Chefs</a>
            </div>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Team Members</h2>
                <h1 class="display-4 text-uppercase">Our Master Chefs</h1>
                <a href="{{ url('/Chefs/create') }}" class="btn btn-secondary">Add chef</a>
                <a class="btn btn-secondary">All chefs</a>
            </div>
            <div class="row g-5">
                @foreach($models as $chef)
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="img/{{ $chef->image }}" alt="">
                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                <div class="d-flex align-items-center justify-content-start">
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square border-inner rounded-0 mx-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="bg-dark border-inner text-center p-4">
                            <h4 class="text-uppercase text-primary">{{ $chef->name }}<a href="{{ url()->current() }}/edit/{{ $chef->id }}" class="btn btn-primary btn-sm float-end"><i class="fas fa-pencil-alt"></i></a><a href="{{ url()->current() }}/delete/{{ $chef->id }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-times"></i></a></h4>
                            <p class="text-white m-0">{{ $chef->specialty }}</p>
                        </div>
                        
                        
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
