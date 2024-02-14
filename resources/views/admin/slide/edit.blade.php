@extends("admin.layouts.master")

@section("content")
  <div class="content">

<h1>Slide Redaktə Et</h1>


    <form action="{{ route('admin.slide.update', $slide) }}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div style="margin-bottom: 15px;">
            <label for="file" style="width: 100%;">Image:</label>
            <input type="file" id="file" name="image_path" value="{{ $slide->image_path }}" required style="width: 50%; padding: 8px;">
            </div>

             <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Title:</label>
            <input type="text" id="title" name="title" value="{{ $slide->title }}" required style="width: 50%; padding: 8px;">
            </div> 
            
            <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Head:</label>
            <input type="text" id="title" name="head" value="{{ $slide->head }}" required style="width: 50%; padding: 8px;">
            </div>

            <button class="btn btn-success" type="submit">Yenilə</button>
    </form>
    </div>

@endsection