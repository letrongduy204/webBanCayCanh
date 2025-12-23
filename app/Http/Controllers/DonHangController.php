<?php

namespace App\Http\Controllers;

use App\Models\DonHang;

class DonHangController extends Controller
{
    public function show(int $id)
    {
        $order = DonHang::query()
            ->where('DonHangID', $id)
            ->firstOrFail();

        return view('layouts.order.donhang', compact('order'));
    }

   
    public function myOrders()
    {
        $uid = session('user_id');
        if (!$uid) return redirect()->route('login');

        $orders = DonHang::query()
            ->where('TaiKhoanID', $uid)
            ->orderByDesc('DonHangID')
            ->paginate(10);

        return view('layouts.order.donhangle', compact('orders'));
    }
}
