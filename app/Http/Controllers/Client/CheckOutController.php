<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Disposal;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductsImg;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
     public function index(){
        $cartItems = Cart::content();
        return view('checkout', ['cartItems' => $cartItems]);
    }

    public function successfull(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'country' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'code' => 'nullable',
        ]);

        $user = User::find(auth()->user()->id);
        $carts = Cart::content();
        // $disposal = new Disposal();
        // $disposal->user_id = $user->id;
        // $disposal->total = Cart::subtotal();
        // $disposal->save();

        $order = Order::create([
            'total_count'=> Cart::count(),
            'total_price'=> Cart::subtotal(),
            'user_id'=> $user->id,
            'country'=> $request->country,
            'city'=> $request->city,
            'address'=> $request->address,
            'state'=> $request->state,
            'zip_code'=> $request->code,
            'order_number'=> uniqid(),
        ]);

        if ($order) {
            foreach (Cart::content() as $key => $cart) {
                $book = ProductsImg::find($cart->id);
                if ($book) {
                    if ($book->qty - $cart->qty >= 0) {
                        $dataItem = [
                            'book_id' => $book->id,
                            'order_id' => $order->id,
                            'qty' => $cart->qty,
                            'price' => $book->price,
                            'total_price' => $cart->price * $cart->qty,
                        ];

                        $orderItem = OrderItem::create($dataItem);
                        if ($orderItem) {
                            $book->qty -= $cart->qty;
                            $book->save();
                        }
                    } else {
                        return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to create order! Because book id: ' . $book->id . ' count is not enough');
                    }
                } else {
                    return redirect()->back()->with('msgType', 'error')->with('message', 'Failed to create order! Because book id: ' . $book->id . ' not found');
                }
            }

            Cart::destroy();
        }


        return view('successfull', compact('order','carts'))->with('success', 'Sifariş uğurla yerinə yetirildi!');
    }


}
