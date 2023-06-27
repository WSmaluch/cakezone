    @extends('main')
    @section('content')
     <!-- Page Header Start -->
     <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Menu & Pricing</h1>
                <a href="{{ url('/') }}">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Menu & Pricing</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Menu & Pricing</h2>
                <h1 class="display-4 text-uppercase">Explore Our Cakes</h1>
                <a href="{{ url('/Products/create') }}" class="btn btn-secondary">Add product</a>
                <a class="btn btn-secondary">All products</a>
            </div>
            <div class="tab-class text-center">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-3">
                            @foreach($models as $model)
                            <div class="col-lg-6">
                                <div class="d-flex h-100">
                                    <div class="flex-shrink-0">
                                        <img class="img-fluid" src="img/{{ $model->photo }}" alt="" style="width: 150px; height: 85px;">
                                        <h4 class="bg-dark text-primary p-2 m-0">{{$model -> price}}</h4>
                                    </div>
                                    <div class="justify-content-center text-start bg-secondary border-inner px-4" style="width: 450px;">
                                        <h5 style="padding-top: 10px;" class="text-uppercase">{{$model -> name}} <a style="margin-right: -25px;" href="{{ url()->current() }}/delete/{{ $model->id }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-times"></i></a></h5>
                                        <a style="margin-right: -25px; font-size: 0.65em;" href="{{ url()->current() }}/edit/{{ $model->id }}" class="btn btn-primary btn-sm float-end"><i class="fas fa-pencil-alt"></i></a>
                                        <span>{{$model -> description}}</span>
                                        <div class=" justify-content-between mt-3" style="margin-left:365px;">
                                          <!-- <a href="{{ url()->current() }}/edit/{{ $model->id }}" class="btn bg-dark text-primary" >Edit</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    @endsection