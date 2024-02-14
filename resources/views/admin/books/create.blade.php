@extends("admin.layouts.master")

@section("content")
 <div class="content">

          <h1>Kitab Yarat</h1>

          <form action="{{ route('admin.books.store') }}" method="post">
        @csrf

         <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Kitab Adı:</label>
            <input type="text" id="title" name="title" required style="width: 50%; padding: 8px;">
        </div>

          <div style="margin-bottom: 15px;">
        <label for="up_id" style="width: 100%;">Kateqoriya:</label>
        <select id="up_id" name="up_id" style="width: 50%; padding: 8px;" required>
            <option value="0">Əsas Kateqoriya</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        </div>

          <div>
        <button class="btn btn-success" type="submit">Yarad</button>
        </div>

    </form>
          <div>
    <a href="@route('books.index')" class="btn btn-success">Geriyə</a>
        </div>

    </div>
@endsection