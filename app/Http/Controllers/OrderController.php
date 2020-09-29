<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');

        $order = Order::orderBy('id', 'DESC')->get();
        $data = $order->map(function ($item) use ($now) {
            if ($now > $item->tgl_order) {
                $item['status_diskon'] = 2;
            } elseif (Order::wherebetween($now, ['tgl_awal', 'tgl_order'])) {
                $item['status_diskon'] = 3;
            }else{
                $item['status_diskon'] = 1;
            }
            return $item;
        });
        return view('admin.order.index', compact('data'));
    }
}
