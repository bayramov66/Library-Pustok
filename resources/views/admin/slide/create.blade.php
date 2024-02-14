@extends("admin.layouts.master")

@section("content")
 <div class="content">

          <h1>Slide Yarat</h1>

          <form enctype='multipart/form-data' action="{{ route('admin.slide.store') }}" method="post">
        @csrf

         <div style="margin-bottom: 15px;">
            <label for="file" style="width: 100%;">Image:</label>
            <input type="file" id="file" name="image_path" required style="width: 50%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Title:</label>
            <input type="title" id="title" name="title" required style="width: 50%; padding: 8px;">
        </div>

          <div style="margin-bottom: 15px;">
            <label for="head" style="width: 100%;">Head:</label>
            <input type="head" id="head" name="head" required style="width: 50%; padding: 8px;">
        </div>

          <div>
        <button class="btn btn-success" type="submit">Yarad</button>
        </div>

    </form>
          <div>
    <a href="@route('slide.index')" class="btn btn-success">Geriyə</a>
        </div>

    </div>
@endsection