@extends("admin.layouts.master")

@section("content")
  <div class="content">

<h1>Kitabı Redaktə Et</h1>


    <form action="{{ route('admin.books.update', $book) }}" method="post">
        @csrf
        @method('PUT')

         <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Başlıq:</label>
            <input type="text" id="title" name="title" value="{{ $book->title }}" required style="width: 50%; padding: 8px;">

            </div>
          <div style="margin-bottom: 15px;">
            <label for="up_id" style="width: 100%;">Kateqoriya:</label>
            <select id="up_id" name="up_id" required style="width: 50%; padding: 8px;">
                <option value="0">Əsas Kateqoriya</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === $book->category_id) selected @endif>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

            <button class="btn btn-success" type="submit">Yenilə</button>
    </form>
    </div>

@endsection