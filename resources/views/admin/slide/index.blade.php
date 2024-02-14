@extends("admin.layouts.master")

@section("content")
  <div class="content">
        <h2>Slide</h2>
    <a href="@route('slide.create')" class="btn btn-success">Create</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">İmage</th>
                    <th scope="col">Title</th>
                    <th scope="col">Head</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slides as $slide)
                    <tr >
                        <th scope="row">{{ $slide->id }}</th>
                        <th scope="row">
                            <img style="width: 200px;" src="{{ asset($slide->image_path) }}" alt="">
                        </th>
                        <th scope="row">{{ $slide->title }}</th>
                        <th scope="row">{{ $slide->head }}</th>
                        <td><a href="{{route('admin.slide.edit', $slide->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form onsubmit="return deleteConfirmation(event)" method="POST" action="{{route('admin.slide.destroy', $slide->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
