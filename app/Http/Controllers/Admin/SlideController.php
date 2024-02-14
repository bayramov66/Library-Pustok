<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class SlideController extends Controller
{
    public function index(){
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    public function create(){
        $slides = Slide::all();
        return view('admin.slide.create', compact('slides'));
    }
    
    public function store(Request $request){
          
        $data=$request->all();
     
        $created = Slide::create($data);
        if ($request->hasFile('image_path')) {
            $img = $request->image_path;
            $extension = $img->getClientOriginalExtension();
        $randomName = Str::random(10);
        $imagePath = 'front/assets/image/';
        $lastName = $randomName . "." . $extension;
        $lasPath = $imagePath . $randomName . "." . $extension;
        
        Image::make($img)->save($lasPath);
        
       $updated = $created->update(['image_path' => $lasPath]);
        
        return redirect()->route('admin.slide.index');
        }
    }

    public function edit($id){
    $slide = Slide::find($id);
    return view('admin.slide.edit', compact('slide'));
    }
    
    public function update(Request $request,$id){

         $request->validate([
        'head' => 'required|max:255',
        'title' => 'required|max:255',
        'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);


        $slides = Slide::find($id);
        if($request->hasFile('image_path')){
            if ($slides->img !== null) {
            Storage::delete($slides->img);
        }

             $newImage = $request->image_path;
        $extension = $newImage->getClientOriginalExtension();
        $randomName = Str::random(10);
        $imagePath = 'front/assets/image/';
        $newImageName = $randomName . "." . $extension;
        $newImagePath = $imagePath . $newImageName;

        Image::make($newImage)->save($newImagePath);

        $slides->image_path = $newImagePath;
        }

    $slides->head = $request->head;
    $slides->title = $request->title;
   
    $slides->save();

    return redirect()->route('admin.slide.index');
    }

    public function destroy($id){
         {
           $a = Slide::where('id',$id)->first();

        $a->delete();
        return redirect()->back();

        }
    }
}



