@extends("admin.layouts.master")

@section("content")
<div class="content">
    <h2>Şəkillər</h2>
    @if(session()->has('success'))
    <div>{{ session('success') }}</div>
    @endif
    <a href="@route('brands.create')" class="btn btn-success">Create</a>

    @if($images->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Şəkillər</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $img)
            <tr>
                <th scope="row">{{ $img->id }}</th>
                <td>
                    <img style="width: 200px;" src="{{asset($img->img)}}" alt="">
                </td>
                <td><a href="{{route('admin.brands.edit', $img->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form onsubmit="return deleteConfirmation(event)" method="POST" action="{{route('admin.brands.destroy', $img->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div>
        hec bir data yoxdur
    </div>
    @endif()

</div>
@endsection
