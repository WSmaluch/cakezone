@extends('main')
@section('search')
    <!-- Formularz wyszukiwania -->
    
@endsection
    @section('content')
     <!-- Page Header Start -->
     <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Orders</h1>
                <a href="{{ url('/') }}">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Orders</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Orders</h2>
                <h1 class="display-4 text-uppercase">Explore Our Orders</h1>
                <a href="{{ url('/Orders/create') }}" class="btn btn-secondary">Add order</a>
                <a  href="{{ url('/Orders') }}"class="btn btn-secondary">All orders</a><br><br>

                <form action="{{ route('orders.search') }}" method="GET">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>

            </div>
            
            <div class="tab-class text-center">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                    @if(count($models) > 0)
                        <div class="row g-3">
                            @foreach($models as $order)
                            <div class="col-lg-6" style=" width:400px" >
                                <div>                       
                                <div class="justify-content-center bg-secondary border-inner px-4" style="height:160px;">
                                    <h5 class="text-uppercase">
                                        {{$order->customer_name}}
                                        <span class="dot @if($order->IsActive) dot-green @else dot-red @endif"></span>
                                        <a style="margin-right: -25px;" href="{{ url()->current() }}/delete/{{ $order->id }}" class="btn btn-danger btn-sm float-end"><i class="fas fa-times"></i></a>
                                    </h5>
                                    <a style="margin-right: -25px; font-size: 0.65em;" href="{{ url()->current() }}/edit/{{ $order->id }}" class="btn btn-primary btn-sm float-end"><i class="fas fa-pencil-alt"></i></a>
                                    <span>{{$order->customer_email}}</span><br/>
                                    <span>{{$order->phone_number}}</span><br/>
                                    <span><b>{{$order->city}} </b> </span><br/>
                                    <span>{{$order->street}} {{$order->house_number}} {{$order->apartment_number}}</span> <br/>
                                    <span><b>{{$order->total}} zł</b></span>
                                </div>
                                    <div class="flex-shrink-0">
                                        <a  href="{{ url()->current() }}/details/{{ $order->id }}" ><h4 class="bg-dark text-primary p-2 m-0 text-uppercase">Details</h4></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @else
                            <p>No orders found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    @endsection