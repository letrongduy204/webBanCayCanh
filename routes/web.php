<?php
use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamNoiBaTController;
use App\Http\Controllers\XuLyLoginController;
use App\Http\Controllers\QuanLyTaiKhoanController;
use App\Http\Controllers\QuanLySanPhamController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DonHangController;

Route::get('/', [SanPhamNoiBaTController::class, 'index'])->name('home');

// chỉ hiển thị sản phẩm nổi bật
// Route::get('/san-pham-noi-bat', [SanPhamNoiBaTController::class, 'featured'])->name('featured');


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



Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/products', [QuanLySanPhamController::class, 'QuanLyCay'])->name('admin.products');
    Route::post('/products', [QuanLySanPhamController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [QuanLySanPhamController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [QuanLySanPhamController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [QuanLySanPhamController::class, 'destroy'])->name('admin.products.destroy');
});


Route::get('/admin/orders', function () {
    return 'Trang quản lý đơn hàng (sẽ sớm được cập nhật)';
})->name('admin.orders');



Route::get('/cay-canh', [SanPhamController::class, 'index'])->name('caycanh.index');
Route::get('/cay-canh/{id}', [SanPhamController::class, 'show'])->name('caycanh.show');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');


Route::get('/don-hang/{id}', [DonHangController::class, 'show'])->name('order.show');
Route::get('/don-hang', [DonHangController::class, 'myOrders'])->name('order.my');
