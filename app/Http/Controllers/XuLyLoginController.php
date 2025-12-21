<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class XuLyLoginController extends Controller
{
        public function showLogin()
    {
        return view('layouts.login.DangNhap');
    }

    public function loginProcess(Request $request)
    {
        // 1. Kiểm tra dữ liệu nhập
        $request->validate([
            'userid'   => 'required',
            'password' => 'required',
        ]);

        // 2. Tìm trong DB: MaDinhDanh + MatKhau
        $user = TaiKhoan::where('MaDinhDanh', $request->userid)
                        ->where('MatKhau', $request->password) // hiện tại chưa hash
                        ->first();

        if (!$user) {
            // Sai tài khoản hoặc mật khẩu
            return back()
                ->withErrors(['login' => 'Sai User ID hoặc mật khẩu'])
                ->withInput();
        }

        // 3. Lưu thông tin vào session
        session([
            'user_id'   => $user->TaiKhoanID,
            'user_name' => $user->HoTen,
            'user_role' => $user->LoaiTaiKhoan,
        ]);

        // 4. Chuyển về trang chủ
        return redirect()->route('home')->with('success', 'Đăng nhập thành công');
    }
        public function logout()
    {
        // Xoá toàn bộ session của user
        session()->flush();

        return redirect()->route('home')->with('success', 'Đăng xuất thành công');
    }
    /* ====== REGISTER ====== */

    public function showRegister()
    {
        return view('layouts.login.DangKy');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:taikhoan,Email',
            'password' => 'required|min:6',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string',
        ]);

        // Tạo mã định danh KHxxxx
        $nextId   = (TaiKhoan::max('TaiKhoanID') ?? 0) + 1;
        $maDinhDanh = 'KH' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        $user = TaiKhoan::create([
            'MaDinhDanh'            => $maDinhDanh,
            'Email'                 => $request->email,
            'MatKhau'               => $request->password,  // nếu muốn có thể hash sau
            'HoTen'                 => $request->name,
            'LoaiTaiKhoan'          => 'Customer',          // đăng ký mới luôn là Customer
            'DienThoai'             => $request->phone,
            'DiaChiGiaoHangMacDinh' => $request->address,
        ]);

        // Đăng nhập luôn sau khi đăng ký
        session([
            'user_id'   => $user->TaiKhoanID,
            'user_name' => $user->HoTen,
            'user_role' => $user->LoaiTaiKhoan,
        ]);

        return redirect()->route('home')->with('success', 'Đăng ký và đăng nhập thành công');
    }

}
