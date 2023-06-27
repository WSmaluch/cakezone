@extends('main')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Add product</h1>
            <a href="{{ url('/') }}">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="{{ url()->current() }}">Add product</a>
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
        <form method="POST" action="/Products/create">
            @csrf
            <div class="row g-3">
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control bg-light border-0 px-4 @error('name') is-invalid @enderror" placeholder="Product name" value="{{ old('name', $model->name) }}" style="height: 55px;">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="number" name="price" class="form-control bg-light border-0 px-4 @error('price') is-invalid @enderror" placeholder="Product price" value="{{ old('price', $model->price) }}" style="height: 55px;">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-12">
                    <textarea name="description" class="form-control bg-light border-0 px-4 py-3 @error('description') is-invalid @enderror" rows="4" placeholder="Description">{{ old('description', $model->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="photo" class="form-control bg-light border-0 px-4 @error('photo') is-invalid @enderror" placeholder="Photo" value="{{ old('photo', $model->photo) }}" style="height: 55px;">
                    @error('photo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <input type="text" name="created_at" class="form-control bg-light border-0 px-4 @error('created_at') is-invalid @enderror" placeholder="Created at" value="{{ old('created_at', date('Y-m-d', strtotime($model->created_at))) }}" style="height: 55px;">
                    @error('created_at')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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