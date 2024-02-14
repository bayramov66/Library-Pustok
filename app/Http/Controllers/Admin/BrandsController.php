<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Models\Brands;
use Illuminate\Support\Facades\Storage;



class BrandsController extends Controller
{
    public function index(){
        $images = Brands::all();
        return view('admin.brands.index', compact('images'));
    }

     public function create(){
        $img = Brands::all();
        return view('admin.brands.create', compact('img'));
    }

    public function store(Request $request){
      
        $request->validate([
        'img' => 'required|image|mimes:jpeg,png,jpg,gif',
    ]);
       if ($request->hasFile('img')) {
            $img = $request->img;
            $extension = $img->getClientOriginalExtension();
            $randomName = Str::random(10);
            $imagePath = 'front/assets/image/';
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;

            Image::make($img)->save($lasPath);

             $img = new Brands(['img' => $lasPath]);
        $img->save();

        return redirect()->route('admin.brands.index');
    }
}

    public function edit($id){
        $img = Brands::findOrFail($id);
      
        return view('admin.brands.edit', compact('img'));
    }

    public function update(Request $request,$id){

       
         $request->validate([
        'img' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ]);


        $imgs = Brands::find($id);
        if($request->hasFile('img')){
            if ($imgs->img !== null) {
            Storage::delete($imgs->img);
        }

             $newImage = $request->img;
        $extension = $newImage->getClientOriginalExtension();
        $randomName = Str::random(10);
        $imagePath = 'front/assets/image/';
        $newImageName = $randomName . "." . $extension;
        $newImagePath = $imagePath . $newImageName;

        Image::make($newImage)->save($newImagePath);

        $imgs->img = $newImagePath;
        }

    $imgs->img = $newImagePath;
    $imgs->save();

    return redirect()->route('admin.brands.index');
    
}

    public function destroy($id){
     $file = Brands::findOrFail($id);
        if (file_exists($file->img)) {
            unlink($file->img);
        }

        $deleted = $file->delete();
        if($deleted) {
            return redirect()->route('admin.brands.index')->with('success', 'Şəkil uğurla silindi.');
        }
    }
}