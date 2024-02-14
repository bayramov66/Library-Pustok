<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Img;
use App\Models\ProductsImg;
use App\Models\Slide;

class HomeController extends Controller
{
    public function index()
    {
        $images = Img::all();
        $productimgs = ProductsImg::orderByDesc('price')->take(12)->get();
        $arrivals = ProductsImg::orderByDesc('created_at')->take(12)->get();
        $most_views = ProductsImg::orderByDesc('views')->take(12)->get();
        $best_seller = ProductsImg::withCount('orderItems')
            ->orderByDesc('order_items_count')->take(12)->get();
        $slides = Slide::all();

        return view('home', compact('images', 'productimgs', 'slides', 'arrivals', 'most_views', 'best_seller'));
    }
}
