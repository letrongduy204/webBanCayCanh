<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class SanPhamController extends Controller
{
    public function index(Request $request)
{
    $q = trim($request->get('q', ''));

    $products = \App\Models\SanPham::query()
        ->select('SanPhamID', 'TenSanPham', 'GiaBan', 'HinhAnhURL')
        ->when($q !== '', fn($qr) => $qr->where('TenSanPham', 'like', "%{$q}%"))
        ->whereIn('TrangThai', ['Còn hàng', 'Đang bán']) 
        ->orderByDesc('SanPhamID')
        ->paginate(16) 
        ->withQueryString();

    return view('layouts.product.sanpham', compact('products', 'q'));
}
public function show(int $id)
{
    $product = \App\Models\SanPham::query()
        ->where('SanPhamID', $id)
        ->firstOrFail();

    
    $related = \App\Models\SanPham::query()
        ->select('SanPhamID', 'TenSanPham', 'GiaBan', 'HinhAnhURL', 'LoaiCayID')
        ->where('LoaiCayID', $product->LoaiCayID)
        ->where('SanPhamID', '!=', $product->SanPhamID)
        ->limit(4)
        ->get();

    return view('layouts.product.chitietSanPham', compact('product', 'related'));
}


}
