<?php
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamNoiBaTController;
use App\Http\Controllers\XuLyLoginController;
use App\Http\Controllers\QuanLyTaiKhoanController;
Route::get('/', function () {
    return view('TrangChu');
})->name('home');

Route::get('/', [SanPhamNoiBaTController::class, 'index'])->name('home');

// chỉ hiển thị sản phẩm nổi bật
Route::get('/san-pham-noi-bat', [SanPhamNoiBaTController::class, 'featured'])->name('featured');


Route::get('/login', [XuLyLoginController::class, 'showLogin'])->name('login');
Route::post('/login', [XuLyLoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [XuLyLoginController::class, 'logout'])->name('logout');


Route::get('/register', [XuLyLoginController::class, 'showRegister'])->name('register');
Route::post('/register', [XuLyLoginController::class, 'registerProcess'])->name('register.process');


Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/users',        [QuanLyTaiKhoanController::class, 'index'])->name('admin.users');
    Route::get('/users/create', [QuanLyTaiKhoanController::class, 'create'])->name('admin.users.create');
    Route::post('/users',       [QuanLyTaiKhoanController::class, 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [QuanLyTaiKhoanController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{id}',      [QuanLyTaiKhoanController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}',   [QuanLyTaiKhoanController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('/admin/products', function () {
    return 'Trang quản lý sản phẩm (Admin)';
})->name('admin.products');

Route::get('/admin/orders', function () {
    return 'Trang quản lý đơn hàng (Admin)';
})->name('admin.orders');

// load san pham len trang san pham

Route::get('/cay-canh', [SanPhamController::class, 'index'])->name('caycanh.index');
//  chi tiet san pham
Route::get('/cay-canh/{id}', [SanPhamController::class, 'show'])->name('caycanh.show');