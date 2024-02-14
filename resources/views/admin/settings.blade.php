@extends("admin.layouts.master")

@section("content")
<div class="content">

    <h1>Ayarlari Redaktə Et</h1>


    <form action="{{ route('admin.settings.update') }}" method="post">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Adres:</label>
            <input type="text" id="address" name="address" value="{{ $settings?->address }}" required style="width: 50%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Nömrə:</label>
            <input type="text" id="phone" name="phone" value="{{ $settings?->phone }}" required style="width: 50%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Email:</label>
            <input type="email" id="email" name="email" value="{{ $settings?->email }}" required style="width: 50%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Facesettings:</label>
            <input type="text" id="url_fb" name="url_fb" value="{{ $settings?->url_fb }}" required style="width: 50%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Twitter:</label>
            <input type="text" id="url_tw" name="url_tw" value="{{ $settings?->url_tw }}" required style="width: 50%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Google Plus:</label>
            <input type="text" id="url_gp" name="url_gp" value="{{ $settings?->url_gp }}" required style="width: 50%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="title" style="width: 100%;">Youtube:</label>
            <input type="text" id="url_yb" name="url_yb" value="{{ $settings?->url_yb }}" required style="width: 50%; padding: 8px;">
        </div>

        <button class="btn btn-success" type="submit">Yenilə</button>
    </form>
</div>

@endsection
