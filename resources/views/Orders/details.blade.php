@extends('main')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Order Details</h1>
                <a href="{{ url('/') }}">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="{{ url('/Orders') }}">Orders</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="{{ url()->current() }}">Order Details</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Order Details Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Order Details</h2>
                <h1 class="display-4 text-uppercase">Order #{{ $model->id }}</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Customer Information</h5>
                            <p class="card-text">Name: {{ $model->customer_name }}</p>
                            <p class="card-text">Email: {{ $model->customer_email }}</p>
                            <p class="card-text">Phone Number: {{ $model->phone_number }}</p>
                            <p class="card-text">Address: {{ $model->street }}, {{ $model->house_number }}, {{ $model->apartment_number }}, {{ $model->city }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Items</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($model->OrdersProducts as $orderProduct)
                                <tr>
                                    <td>{{ $orderProduct->products->name }}</td>
                                    <td>{{ $orderProduct->quantity }}</td>
                                    <td>{{ $orderProduct->products->price }}</td>
                                    <td>{{ $orderProduct->products->price * $orderProduct->quantity }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <h5 class="card-title">Total Amount: {{ $model->total }} zł</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Order Details End -->
@endsection
