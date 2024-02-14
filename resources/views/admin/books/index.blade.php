@extends("admin.layouts.master")

@section("content")
  <div class="content">
        <h2>Kitablar</h2>
    <a href="@route('books.create')" class="btn btn-success">Create</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kitablar</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr style="color: red">
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }}</td>
                        <td><a href="{{route('admin.books.edit', $book->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form method="POST" action="{{route('admin.books.destroy', $book->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                        @if($book->subcategories && $book->subcategories->count() > 0)
                               
                                @foreach($book->subcategories as $cat)
                                 <tr style="color: white">
                                    <th scope="row">{{ $cat->id }}</th>
                                    <td>{{ $cat->title }}</td>
                                    <td><a href="{{route('admin.books.edit', $cat->id)}}" class="btn btn-primary">Edit</a></td>
                                    <td>
                                        <form onsubmit="return deleteConfirmation(event)" method="POST" action="{{route('admin.books.destroy', $cat->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach                           
                           
                            @endif
                        @endforeach
            </tbody>
        </table>

        
    </div>
@endsection