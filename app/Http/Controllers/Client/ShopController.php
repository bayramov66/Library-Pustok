<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductsImg;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        $products = ProductsImg::query();
        if ($slug) {
            $foundCategory = Category::where('slug', $slug)->first();
            $products = $products->where('category_id', $foundCategory->id);
        }
        if ($request->sort_by) {
            switch ($request->sort_by) {
                case 'a-z':
                    $products = $products->orderBy("title", 'asc');
                    break;
                case 'z-a':
                    $products = $products->orderBy("title", 'desc');
                    break;
                case 'l-h':
                    $products = $products->orderBy('price', 'asc');
                    break;
                case 'h-l':
                    $products = $products->orderBy('price', 'desc');
                    break;
                default:
                    $products = $products->orderBy('created_at', 'asc');
                    break;
            }
        }
        $products = $products->paginate(4);


        return view('shop', compact('products'));
    }


    public function detail($id)
    {
        $product = ProductsImg::findOrFail($id);
        if (!$product) {
            return abort(404);
        }

        return view('shop_details', compact('product'));
    }
}
