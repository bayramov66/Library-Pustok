<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductsImg;
use Intervention\Image\Facades\Image;
use App\Models\Img;
use Illuminate\Support\Facades\Storage;

class ProductImgController extends Controller
{
    public function index()
    {
        $productimgs = ProductsImg::all();
        return view('admin.productimgs.index', compact('productimgs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.productimgs.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        if ($request->hasFile('file')) {
            unset($data['file']);
            $img = $request->file('file'); 

            $extension = $img->getClientOriginalExtension();
            $randomName = Str::random(10);
            $imagePath = 'front/assets/image/';
            $lastName = $randomName . "." . $extension;
            $lasPath = $imagePath . $randomName . "." . $extension;

            Image::make($img)->save($lasPath);

            $data['img'] =  $lasPath;
            $data['category_id'] = $request->category_id;

            $created = ProductsImg::create($data);

            if ($created) {
                return redirect()->route('admin.products.index')->with('success', 'Şəkil uğurla yükləndi.');
            }
        }
    }



    public function edit($id)
    {
        $categories = Category::all();
        $productImg = ProductsImg::findorFail($id);
        if (!$productImg) {
            return redirect()->back()->with('error', 'Product image not found');
        }
        return view('admin.productimgs.edit', compact('productImg', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $images = ProductsImg::find($id);
        if ($request->hasFile('img')) {

            if ($images->img !== null) {
                Storage::delete($images->img);
            }

            $newImage = $request->img;
            $extension = $newImage->getClientOriginalExtension();
            $randomName = Str::random(10);
            $imagePath = 'front/assets/image/';
            $newImageName = $randomName . "." . $extension;
            $newImagePath = $imagePath . $newImageName;

            Image::make($newImage)->save($newImagePath);

            $images->img = $newImagePath;
        }

        $images->author = $request->author;
        $images->title = $request->title;
        $images->img = $newImagePath;
        $images->price = $request->price;
        $images->percent = $request->percent;
        $images->category_id = $request->category_id;


        $images->save();

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $a = ProductsImg::where('id', $id)->first();

        $a->delete();
        return redirect()->back();
    }
}
