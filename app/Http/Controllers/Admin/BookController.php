<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        $books = Category::where('up_id', 0)->get();
        return view('admin.books.index', compact('books'));
    }

    public function create(){
        $categories = Category::where('up_id', 0)->get();
        return view('admin.books.create', compact('categories'));
    }

    public function destroy(Category $book){
        $book->subcategories()->delete();
    $book->delete();
    return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully');
}

    public function edit($id) {
        $book = Category::findorFail($id);
        $categories = Category::where('up_id', 0)->get();

        return view('admin.books.edit',compact('book', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'up_id' => 'required'
        ]);

        $categories = Category::findorFail($id);
        $categories->update([
            'title' => $request->input('title'),
            'up_id' => $request->input('up_id'),
            'slug' => Str::slug($request->title)
        ]);

        return redirect()->route('admin.books.index')->with('success', 'Kitab uğurla düzəltildi.');
    }



    public function store(Request $request){
        $request->validate([
        'title' => 'required|string|max:255',
        'up_id' => 'required'
    ]);

    $data = $request->all();
    $data['slug'] = Str::slug($request->title);
    Category::create($data);


    return redirect()->route('admin.books.index')->with('success', 'Kitab uğurla əlavə edildi.');

    }

}
