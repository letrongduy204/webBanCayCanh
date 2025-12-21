<?php

namespace App\Http\Controllers;

use App\Models\SanPham;

class SanPhamNoiBaTController extends Controller
{
    // Trang chủ
    public function index()
    {
        $products = SanPham::select('SanPhamID', 'TenSanPham', 'GiaBan', 'HinhAnhURL')
                            ->take(8)
                            ->get();

        // Truyền $products sang TrangChu
        return view('TrangChu', compact('products'));
    }

    // Trang chỉ hiển thị block "sản phẩm nổi bật" (nếu bạn muốn dùng riêng)
    public function featured()
    {
        $products = SanPham::select('SanPhamID', 'TenSanPham', 'GiaBan', 'HinhAnhURL')
                            ->take(8)
                            ->get();

        // Nếu bạn muốn dùng view riêng:
        // return view('featured', compact('products'));

        // Hoặc dùng lại layout/noiBat:
        return view('layouts.noiBat', compact('products'));
    }
}
