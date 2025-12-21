<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('layouts.navbar')

<div class="container mt-4">
    <h2 class="mb-3">Sửa tài khoản #{{ $user->TaiKhoanID }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->TaiKhoanID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Mã định danh</label>
            <input type="text" class="form-control" value="{{ $user->MaDinhDanh }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Họ tên</label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $user->HoTen) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $user->Email) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu mới (nếu đổi)</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">Để trống nếu không muốn đổi mật khẩu.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Loại tài khoản</label>
            <select name="role" class="form-select" required>
                <option value="Customer" {{ old('role', $user->LoaiTaiKhoan) === 'Customer' ? 'selected' : '' }}>Customer</option>
                <option value="Admin" {{ old('role', $user->LoaiTaiKhoan) === 'Admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Điện thoại</label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone', $user->DienThoai) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <textarea name="address" class="form-control" rows="2">{{ old('address', $user->DiaChiGiaoHangMacDinh) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary ms-2">Quay lại</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
