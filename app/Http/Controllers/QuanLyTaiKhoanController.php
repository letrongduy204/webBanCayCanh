<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class QuanLyTaiKhoanController extends Controller
{
    // Danh sách tài khoản
    public function index()
    {
        $users = TaiKhoan::orderBy('TaiKhoanID', 'asc')->paginate(10);

        return view('layouts.ql_TaiKhoan.index', compact('users'));
    }

    // Form tạo mới
    public function create()
    {
        return view('layouts.ql_TaiKhoan.create');
    }

    // Lưu tài khoản mới
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:taikhoan,Email',
            'password' => 'required|min:6',
            'role'     => 'required|in:Admin,Customer',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
        ]);

        // Tạo MaDinhDanh: Admin -> NVxxxx, Customer -> KHxxxx
        $nextId = (TaiKhoan::max('TaiKhoanID') ?? 0) + 1;
        $prefix = $request->role === 'Admin' ? 'NV' : 'KH';
        $maDinhDanh = $prefix . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        TaiKhoan::create([
            'MaDinhDanh'            => $maDinhDanh,
            'Email'                 => $request->email,
            'MatKhau'               => $request->password, // sau này có thể hash
            'HoTen'                 => $request->name,
            'LoaiTaiKhoan'          => $request->role,
            'DienThoai'             => $request->phone,
            'DiaChiGiaoHangMacDinh' => $request->address,
        ]);

        return redirect()->route('admin.users')->with('success', 'Thêm tài khoản thành công');
    }

    // Form sửa
    public function edit($id)
    {
        $user = TaiKhoan::findOrFail($id);

        return view('layouts.ql_TaiKhoan.edit', compact('user'));
    }

    // Cập nhật tài khoản
    public function update(Request $request, $id)
    {
        $user = TaiKhoan::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:taikhoan,Email,' . $user->TaiKhoanID . ',TaiKhoanID',
            'password' => 'nullable|min:6',
            'role'     => 'required|in:Admin,Customer',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
        ]);

        $user->HoTen        = $request->name;
        $user->Email        = $request->email;
        $user->LoaiTaiKhoan = $request->role;
        $user->DienThoai    = $request->phone;
        $user->DiaChiGiaoHangMacDinh = $request->address;

        if ($request->filled('password')) {
            $user->MatKhau = $request->password; // sau này có thể hash
        }

        $user->save();

        return redirect()->route('admin.users')->with('success', 'Cập nhật tài khoản thành công');
    }

    // Xoá tài khoản
    public function destroy($id)
    {
        // không cho admin tự xoá chính mình (tuỳ)
        if (session('user_id') == $id) {
            return redirect()->route('admin.users')->with('error', 'Không thể xoá tài khoản đang đăng nhập.');
        }

        $user = TaiKhoan::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Xoá tài khoản thành công');
    }

}
