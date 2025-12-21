<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('layouts.navbar')

<div class="container mt-4">
    <h2 class="mb-3">Quản lý tài khoản</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Thêm tài khoản</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Mã Định Danh</th>
            <th>Họ tên</th>
            <th>Email</th>
            <th>Loại tài khoản</th>
            <th>Điện thoại</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $u)
            <tr>
                <td>{{ $u->TaiKhoanID }}</td>
                <td>{{ $u->MaDinhDanh }}</td>
                <td>{{ $u->HoTen }}</td>
                <td>{{ $u->Email }}</td>
                <td>{{ $u->LoaiTaiKhoan }}</td>
                <td>{{ $u->DienThoai }}</td>
                <td>
                    <a href="{{ route('admin.users.edit', $u->TaiKhoanID) }}" class="btn btn-sm btn-warning">Sửa</a>

                    <form action="{{ route('admin.users.destroy', $u->TaiKhoanID) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Bạn có chắc muốn xoá tài khoản này?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Xoá</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
