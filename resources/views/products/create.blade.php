@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <h2>Add New Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="form-group col-12 col-md-6 mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                        required>
                </div>


                <div class="form-group col-12 col-md-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" id="price"
                        value="{{ old('price') }}" required>
                </div>

                <div class="form-group col-12 col-md-6 mb-3">
                    <label for="size" class="form-label">Size</label>
                    <select name="size" class="form-select" id="size" required>
                        <option value="">Select Size</option>
                        <option value="XS" {{ old('size') == 'XS' ? 'selected' : '' }}>XS</option>
                        <option value="S" {{ old('size') == 'S' ? 'selected' : '' }}>S</option>
                        <option value="M" {{ old('size') == 'M' ? 'selected' : '' }}>M</option>
                        <option value="L" {{ old('size') == 'L' ? 'selected' : '' }}>L</option>
                        <option value="XL" {{ old('size') == 'XL' ? 'selected' : '' }}>XL</option>
                        <option value="XXL" {{ old('size') == 'XXL' ? 'selected' : '' }}>XXL</option>
                    </select>
                </div>


                <div class="form-group col-12 col-md-6 mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" class="form-select" id="category_id" required>
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-12 col-md-6 mb-3">
                    <label for="stock_quantity" class="form-label">Stock Quantity</label>
                    <input type="number" name="stock_quantity" class="form-control" id="stock_quantity"
                        value="{{ old('stock_quantity') }}" required>
                </div>

                <div class="form-group col-12 col-md-6 mb-3">
                    <label for="picture_url">Product Image:</label>
                    <input type="file" class="form-control" name="picture_url" id="picture_url" accept="image/*">
                </div>

                <div class="form-group mb-2">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="4">{{ old('description') }}</textarea>
                </div>

            </div>
            <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-3"> Save Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm rounded-5 mb-3">Cancel</a>
        </form>
    </div>


@endsection
