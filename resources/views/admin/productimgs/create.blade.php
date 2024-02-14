@extends('admin.layouts.master')

@section('content')
<div class="content">

    <h1>Yeni Məhsul Şəkili Əlavə Et</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
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

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="title" name="author" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div style="margin-bottom: 15px;">
            <input type="file" id="image" name="file" accept="image/jpeg, image/png, image/jpg" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Qiymət</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="title">Percent:</label>
            <input type="number" name="percent" id="title" value="{{ old('percent') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Əlavə Et</button>
    </form>
</div>
</div>

@endsection
