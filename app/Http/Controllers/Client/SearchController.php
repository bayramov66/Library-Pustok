<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\ProductsImg;
use Illuminate\Http\Request;
use App\Models\Search;

class SearchController extends Controller
{
    public function index(){
        return view('search.index');
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = ProductsImg::where('title', 'like', '%' . $query . '%')
            ->get();

        return view('search', compact('products'));
    }
}
