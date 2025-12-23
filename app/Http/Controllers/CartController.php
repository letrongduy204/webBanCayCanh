<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DonHang;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []); 

        $ids = array_keys($cart);
        $products = collect();
        if (!empty($ids)) {
            $products = SanPham::query()
                ->whereIn('SanPhamID', $ids)
                ->get()
                ->keyBy('SanPhamID');
        }

        $items = [];
        $total = 0;

        foreach ($cart as $id => $qty) {
            if (!isset($products[$id])) continue;
            $p = $products[$id];
            $price = (float) $p->GiaBan;
            $line = $price * (int)$qty;
            $total += $line;

            $items[] = [
                'id' => (int)$id,
                'qty' => (int)$qty,
                'p' => $p,
                'line' => $line,
            ];
        }

        return view('layouts.product.GioHang', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        $id = (int)$request->input('id');
        $qty = max(1, (int)$request->input('qty', 1));

        // kiểm tra sản phẩm tồn tại
        SanPham::where('SanPhamID', $id)->firstOrFail();

        $cart = session()->get('cart', []);
        $cart[$id] = ($cart[$id] ?? 0) + $qty;
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        $quantities = $request->input('qty', []); 
        foreach ($quantities as $id => $qty) {
            $id = (int)$id;
            $qty = (int)$qty;

            if ($qty <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id] = $qty;
            }
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Đã cập nhật giỏ hàng!');
    }

    public function remove($id)
    {
        $id = (int)$id;
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Đã xóa toàn bộ giỏ hàng!');
    }


public function checkout(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')
            ->with('error', 'Giỏ hàng trống!');
    }

    // tính tổng tiền
    $ids = array_keys($cart);
    $products = SanPham::whereIn('SanPhamID', $ids)->get()->keyBy('SanPhamID');

    $total = 0;
    foreach ($cart as $id => $qty) {
        if (!isset($products[$id])) continue;
        $total += $products[$id]->GiaBan * $qty;
    }

    // tạo đơn hàng
    $order = DonHang::create([
        'TaiKhoanID' => session('user_id'),
        'NgayDatHang' => Carbon::now(),
        'TongTien' => $total,
        'TrangThaiDonHang' => 'Chờ xử lý',
        'TenNguoiNhan' => session('user_name'),
        'DiaChiGiaoHang' => 'Chưa cập nhật',
        'DienThoaiNguoiNhan' => 'Chưa cập nhật',
        'PhuongThucThanhToan' => 'COD',
        'TrangThaiThanhToan' => 'Chưa thanh toán',
    ]);

    // xoá giỏ hàng
    session()->forget('cart');

    return redirect()->route('order.show', $order->DonHangID)
        ->with('success', 'Đặt hàng thành công!');
}

}
