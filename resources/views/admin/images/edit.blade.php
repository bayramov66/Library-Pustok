@extends("admin.layouts.master")

@section("content")
<div class="content">

    <h1>Şəkili Redaktə Et</h1>


    <form enctype='multipart/form-data' action="{{ route('admin.images.update', $img->id) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <img style="width: 200px;" src="{{asset($img->img)}}" alt="">
        </div>
        <div style="margin-bottom: 15px;">
            <input type="file" id="file" name="img" required style="width: 50%; padding: 8px;">

        </div>
        <button class="btn btn-success" type="submit">Yenilə</button>
    </form>
</div>

@endsection
