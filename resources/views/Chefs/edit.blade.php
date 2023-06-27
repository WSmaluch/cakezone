@extends('main')
@section('content')

<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Edit an chef</h1>
            <a href="{{ url('/') }}">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="{{ url()->current() }}">Edit an chef</a>
        </div>
    </div>
</div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Edit Chef</h2>
                <h1 class="display-4 text-uppercase">{{ $model->name }}</h1>
            </div>
            <div class="row justify-content-center">
    <div class="col-lg-6">
        <form method="POST" action="/Chefs/update/{{ $model->id }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $model->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Specialty</label>
                <input type="text" class="form-control @error('specialty') is-invalid @enderror" id="specialty" name="specialty" value="{{ old('specialty', $model->specialty) }}">
                @error('specialty')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"><br>
                <img style="margin-left: 20%;" class="img-fluid" src="/img/{{ $model->image }}" width="350px">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Chef</button>
            </div>
        </form>
    </div>
</div>

        </div>
    </div>
@endsection
