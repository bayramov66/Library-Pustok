@extends('admin.layouts.master')

@section('content')
<div class="content">
    <h1>Məhsullar</h1>

    <a href="@route('products.create')" class="btn btn-success">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Authors</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">Percent</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productimgs as $img)
            <tr>
                <td>{{ $img->id }}</td>
                <td><img style="width: 200px;" src="{{ asset($img->img) }}" alt="{{ $img->title }}" style="max-width: 100px; max-height: 100px;"></td>
                <td>{{ $img->author }}</td>
                <td>{{ $img->title }}</td>
                <td>{{ $img->price }}</td>
                <td>{{ $img->percent }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $img->id) }}" class="btn btn-primary">Redaktə et</a>
                <td>
                    <form onsubmit="return deleteConfirmation(event)" method="POST" action="{{route('admin.products.destroy', $img->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
