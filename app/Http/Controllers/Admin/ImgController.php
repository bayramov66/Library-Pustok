<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Img;
use App\Http\Requests\ImageUploadRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ImgController extends Controller
{
    public function index(){
        $images = Img::all();
        return view('admin.images.index', compact('images'));
    }

     public function create(){
      
        $imgs = Img::all();
        return view('admin.images.create', compact('imgs'));
    }

    public function store(Request $request){
        $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);

        if ($request->hasFile('file')) {
            $img = $request->file;
            $extension = $img->getClientOriginalExtension();
            $randomName = Str::random(10);
            $imagePath = 'front/assets/image/';
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;

            Image::make($img)->save($lasPath);

      

        $img = new Img(['img' => $lasPath]);
        $img->save();

        return redirect()->route('admin.images.index')->with('success', 'Şəkil uğurla yükləndi.');
    }

}

 public function destroy($id) {
    $file = Img::findOrFail($id);
        if (file_exists($file->img)) {
            unlink($file->img);
        }

        $deleted = $file->delete();
        if($deleted) {
            return redirect()->route('admin.images.index')->with('success', 'Şəkil uğurla silindi.');
        }
    }

    public function edit($id){
        $img = Img::findOrFail($id);
      
        return view('admin.images.edit', compact('img'));
    }

    public function update(Request $request, $id){
      
        $data = $request->all();
        $mainImg = Img::findorFail($id);
      
        $randomName = Str::random(10);
        $imagePath =  'front/assets/image/';
        if ($request->hasFile('img')) {
            if (file_exists($imagePath .  $mainImg->img)) {
                unlink($imagePath .  $hasElement);
            }
   
            $img = $request->img;
            $extension = $img->getClientOriginalExtension();
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;
            Image::make($img)->save($lasPath);
            $data['img'] = $lasPath;
          

            $updated = $mainImg->update($data);

            if($updated) {
                  return redirect()->route('admin.images.index')->with('success', 'Şəkil uğurla deytisildi.');
            }

    }}
}
