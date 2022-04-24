<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Oxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->user_id = Auth::id();
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->oxy_id = $request->oxy_id;
        $order->total = $request->total;
        $order->quantity = $request->quantity;
        $order->message = $request->message;
        $order->save();
        return response()->json(['message' => 'Mua thành công']);
    }
    public function index()
    {
        $orders = Order::latest()->paginate(5);
        return view('admin.order.index')
            ->with(compact('orders'));
    }
    public function getItem(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::latest()->paginate(5);
            return view('admin.order.item')
                ->with(compact('orders'))->render();
        }
    }
    public function detail($id)
    {
        $order = Order::where('id', $id)->first();
        $oxy = Oxy::where('id', $order->oxy_id)->first();
        if (!empty($order)) {
            return view('admin.order.detail')
                ->with(compact('order', 'oxy'));
        } else {
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!empty($order)) {
            $order->status = $request->status;
            $order->update();
            return response()->json(['message' => 'Cập nhật thành công']);
        } else {
            abort(404);
        }
    }
}
