@extends('main')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Make an order</h1>
            <a href="{{ url('/') }}">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="{{ url()->current() }}">Make an order</a>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="container">
    <h1>Create Order</h1>
    <form method="POST" action="/Orders/create">
        @csrf
        <div class="form-group">
            <label for="customer_name">Customer Name:</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}">
            @error('customer_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="customer_email">Customer Email:</label>
            <input type="email" name="customer_email" id="customer_email" class="form-control @error('customer_email') is-invalid @enderror" value="{{ old('customer_email') }}">
            @error('customer_email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Phone number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}">
            @error('phone_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
            @error('city')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}">
            @error('street')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="house_number">House number:</label>
            <input type="text" name="house_number" id="house_number" class="form-control @error('house_number') is-invalid @enderror" value="{{ old('house_number') }}">
            @error('house_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="apartment_number">Apartment number:</label>
            <input type="text" name="apartment_number" id="apartment_number" class="form-control @error('apartment_number') is-invalid @enderror" value="{{ old('apartment_number') }}">
            @error('apartment_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div id="products-container">
            <div class="product-group">
                <div class="form-group">
                    <label for="product">Product:</label>
                    <select name="products[]" class="form-control @error('products.*') is-invalid @enderror">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    @error('products.*')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantities[]" class="form-control @error('quantities.*') is-invalid @enderror" value="{{ old('quantities.*') }}">
                    @error('quantities.*')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <hr>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="add-product-btn">Add Product</button>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
    
</div>


    <script>
        document.getElementById('add-product-btn').addEventListener('click', function() {
            var productsContainer = document.getElementById('products-container');

            var productGroup = document.createElement('div');
            productGroup.classList.add('product-group');

            var productSelect = document.createElement('select');
            productSelect.name = 'products[]';
            productSelect.classList.add('form-control');
            productSelect.required = true;

            var defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Select Product';
            productSelect.appendChild(defaultOption);

            @foreach($products as $product)
                var productOption = document.createElement('option');
                productOption.value = '{{ $product->id }}';
                productOption.textContent = '{{ $product->name }}';
                productSelect.appendChild(productOption);
            @endforeach

            var quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.name = 'quantities[]';
            quantityInput.classList.add('form-control');
            quantityInput.required = true;

            var hr = document.createElement('hr');

            productGroup.appendChild(productSelect);
            productGroup.appendChild(quantityInput);
            productGroup.appendChild(hr);

            productsContainer.appendChild(productGroup);
        });
    </script>
@endsection
