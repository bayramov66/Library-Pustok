@extends('admin.layouts.master')

@section('content')
<div class="content">
    <h1>Məhsulu Rədaktə Ed</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.products.update', $productImg->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Author:</label>
            <input type="text" name="author" id="head" value="{{ old('author', $productImg->author) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $productImg->title) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <div>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="{{ old('price', $productImg->price) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="title">Percent:</label>
            <input type="text" name="percent" id="title" value="{{ old('percent', $productImg->percent) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="file">Image:</label>
            <img style="width: 200px;" src="{{asset($productImg->img)}}" alt="">
            <input type="file" id="file" name="img" required style="width: 50%; padding: 8px;">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
