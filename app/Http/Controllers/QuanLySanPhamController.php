<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use App\Models\LoaiCay;
use Illuminate\Http\Request;

class QuanLySanPhamController extends Controller
{
    // GET /admin/products
    public function QuanLyCay()
    {
        $loaiCays = LoaiCay::query()->orderBy('TenLoai')->get();

        $products = SanPham::query()
            ->leftJoin('loaicay', 'loaicay.LoaiCayID', '=', 'sanpham.LoaiCayID')
            ->select(
                'sanpham.*',
                'loaicay.TenLoai as TenLoai'
            )
            ->orderByDesc('sanpham.SanPhamID')
            ->paginate(10);

        // view chính sẽ include 2 form
        return view('layouts.admin.QuanLySanPham', compact('loaiCays', 'products'));
    }

    // POST /admin/products
    public function store(Request $request)
    {
        $data = $request->validate([
            'MaSKU' => ['required','string','max:50','unique:sanpham,MaSKU'],
            'TenSanPham' => ['required','string','max:255'],
            'MoTa' => ['nullable','string'],
            'GiaBan' => ['required','numeric','min:0'],
            'SoLuongTonKho' => ['required','integer','min:0'],
            'LoaiCayID' => ['nullable','integer','exists:loaicay,LoaiCayID'],
            'TrangThai' => ['required','string','max:50'],
            'HinhAnhUpload' => ['nullable','image','max:2048'],
        ]);

        $imageUrl = null;
        if ($request->hasFile('HinhAnhUpload')) {
            $file = $request->file('HinhAnhUpload');
            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('image'), $name);
            $imageUrl = '/image/'.$name;
        }

        SanPham::create([
            'MaSKU' => $data['MaSKU'],
            'TenSanPham' => $data['TenSanPham'],
            'MoTa' => $data['MoTa'] ?? null,
            'GiaBan' => $data['GiaBan'],
            'SoLuongTonKho' => $data['SoLuongTonKho'],
            'LoaiCayID' => $data['LoaiCayID'] ?? null,
            'HinhAnhURL' => $imageUrl,
            'TrangThai' => $data['TrangThai'],
        ]);

        return redirect()->route('admin.products')->with('success', 'Thêm sản phẩm thành công!');
    }
    public function edit($id)
    {
        $loaiCays = \App\Models\LoaiCay::orderBy('TenLoai')->get();
        $product  = \App\Models\SanPham::where('SanPhamID', $id)->firstOrFail();

        return view('layouts.admin.SuaSanPham', compact('product', 'loaiCays'));
    }
    public function update(Request $request, $id)
{
    $product = \App\Models\SanPham::where('SanPhamID', $id)->firstOrFail();

    $data = $request->validate([
        'MaSKU' => ['required','string','max:50',"unique:sanpham,MaSKU,{$product->SanPhamID},SanPhamID"],
        'TenSanPham' => ['required','string','max:255'],
        'MoTa' => ['nullable','string'],
        'GiaBan' => ['required','numeric','min:0'],
        'SoLuongTonKho' => ['required','integer','min:0'],
        'LoaiCayID' => ['nullable','integer','exists:loaicay,LoaiCayID'],
        'TrangThai' => ['required','string','max:50'],
        'HinhAnhUpload' => ['nullable','image','max:2048'],
    ]);

    if ($request->hasFile('HinhAnhUpload')) {
        $file = $request->file('HinhAnhUpload');
        $name = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('image'), $name);
        $product->HinhAnhURL = '/image/'.$name;
    }

    $product->fill([
        'MaSKU' => $data['MaSKU'],
        'TenSanPham' => $data['TenSanPham'],
        'MoTa' => $data['MoTa'] ?? null,
        'GiaBan' => $data['GiaBan'],
        'SoLuongTonKho' => $data['SoLuongTonKho'],
        'LoaiCayID' => $data['LoaiCayID'] ?? null,
        'TrangThai' => $data['TrangThai'],
    ])->save();

    return redirect()->route('admin.products')->with('success', 'Cập nhật sản phẩm thành công!');
}
public function destroy($id)
{
    $product = \App\Models\SanPham::where('SanPhamID', $id)->firstOrFail();
    $product->delete();

    return redirect()->route('admin.products')->with('success', 'Đã xóa sản phẩm!');
}


}
