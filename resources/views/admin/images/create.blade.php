@extends("admin.layouts.master")

@section("content")

 <div class="content">

          <h1>Şəkil Yarad</h1>

    <form enctype= 'multipart/form-data' action="{{ route('admin.images.store') }}" method="post">
        @csrf
         <div style="margin-bottom: 15px;">
            <input type="file" id="file" name="file" accept="image/jpeg, image/png, image/jpg" required >
        </div>
          <div>
        <button class="btn btn-success" type="submit">Yarad</button>
        </div>

    </form>
          <div>
    <a href="@route('images.index')" class="btn btn-success">Geriyə</a>
        </div>

    </div>
@endsection