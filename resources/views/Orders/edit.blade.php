@extends('main')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Edit an order</h1>
            <a href="{{ url('/') }}">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="{{ url()->current() }}">Edit an order</a>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid contact position-relative px-5" style="margin-top: -183px;">
    <div class="container">
        <div class="row g-5 mb-5">
            <div class="col-lg-4 col-md-6">
                
            </div>
            <div class="col-lg-4 col-md-6">
                
            </div>
            <div class="col-lg-4 col-md-6">
                
            </div>
        </div>
        <div class="row justify-content-center">
    <div class="col-lg-6">
        <form method="POST" action="/Orders/update/{{ $model->id }}">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <input type="text" name="customer_name" class="form-control bg-light border-0 px-4 @error('customer_name') is-invalid @enderror" placeholder="Name" value="{{ old('customer_name', $model->customer_name) }}" style="height: 55px;">
                    @error('customer_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="email" name="customer_email" class="form-control bg-light border-0 px-4 @error('customer_email') is-invalid @enderror" placeholder="Customer e-mail" value="{{ old('customer_email', $model->customer_email) }}" style="height: 55px;">
                    @error('customer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <input type="text" name="phone_number" class="form-control bg-light border-0 px-4 @error('phone_number') is-invalid @enderror" placeholder="Phone number" value="{{ old('phone_number', $model->phone_number) }}" style="height: 55px;">
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="city" class="form-control bg-light border-0 px-4 @error('city') is-invalid @enderror" placeholder="City" value="{{ old('city', $model->city) }}" style="height: 55px;">
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="street" class="form-control bg-light border-0 px-4 @error('street') is-invalid @enderror" placeholder="Street" value="{{ old('street', $model->street) }}" style="height: 55px;">
                    @error('street')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <input type="text" name="house_number" class="form-control bg-light border-0 px-4 @error('house_number') is-invalid @enderror" placeholder="House number" value="{{ old('house_number', $model->house_number) }}" style="height: 55px;">
                    @error('house_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-3">
                    <input type="text" name="apartment_number" class="form-control bg-light border-0 px-4 @error('apartment_number') is-invalid @enderror" placeholder="Apartment number" value="{{ old('apartment_number', $model->apartment_number) }}" style="height: 55px;">
                    @error('apartment_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="total" class="form-control bg-light border-0 px-4 @error('total') is-invalid @enderror" placeholder="Total" value="{{ old('total', $model->total) }}" style="height: 55px;">
                    @error('total')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="created_at" class="form-control bg-light border-0 px-4 @error('created_at') is-invalid @enderror" placeholder="Created at" value="{{ old('created_at', date('Y-m-d', strtotime($model->created_at))) }}" style="height: 55px;">
                    @error('created_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="updated_at" class="form-control bg-light border-0 px-4 @error('updated_at') is-invalid @enderror" placeholder="Updated at" value="{{ old('updated_at', date('Y-m-d', strtotime($model->updated_at))) }}" style="height: 55px;">
                    @error('updated_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="IsActive" id="IsActive" {{ old('IsActive', $model->IsActive) ? 'checked' : '' }}>
                    <label class="form-check-label" for="IsActive">
                        Is Active
                    </label>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-primary border-inner w-100 py-3" type="submit">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

    </div>
</div>
</div>
<!-- Contact End -->
@endsection