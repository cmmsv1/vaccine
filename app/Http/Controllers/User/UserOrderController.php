<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Oxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->paginate(5);
        return view('user.order.index')
            ->with(compact('orders'));
    }
    public function detail($id)
    {
        $order = Order::where('id', $id)->first();
        $oxy = Oxy::where('id', $order->oxy_id)->first();
        if (!empty($order)) {
            return view('user.order.detail')
                ->with(compact('oxy', 'order'));
        } else {
            abort(404);
        }
    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!empty($order)) {
            $order->message = $request->message;
            $order->update();
            return response()->json(['message' => 'Cập nhật thành công']);
        } else {
            abort(404);
        }
    }
    public function getItem(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::latest()->paginate(5);
            return view('user.order.item')
                ->with(compact('orders'))->render();
        }
    }
}
