<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }


    public function accept(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $order->is_accepted = 1;
        $order->save();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been updated!');
    }
    public function reject(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $order->is_accepted = 0;
        $order->save();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been updated!');
    }

    public function details(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        return view('admin.orders.details', compact('order'));
    }

    public function delete(Order $order)
    {
        if (!$order) {
            return abort(404);
        }

        $order->delete();

        return redirect()->back()
            ->with('type', 'success')
            ->with('message', 'Order by id:' . $order->id . ' has been deleted!');
    }
}
