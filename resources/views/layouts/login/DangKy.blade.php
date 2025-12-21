<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Register - Cây Nhà Trồng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            margin: 0;
            position: relative;
        }
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url('{{ asset("image/nen1.jpg") }}');
            background-size: cover;
            background-position: center;
            filter: blur(4px);
            transform: scale(1.05);
            z-index: -2;
        }
        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.35);
            z-index: -1;
        }
        .card-auth {
            max-width: 480px;
            width: 100%;
            background-color: rgba(248, 250, 252, 0.96);
            border-radius: 0.75rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.25);
            padding: 2.5rem 2.25rem;
        }
        .btn-primary-custom {
            background-color: #facc15;
            border-color: #facc15;
            font-weight: 700;
            color: #1f2933;
        }
        .btn-primary-custom:hover {
            background-color: #eab308;
            border-color: #eab308;
        }
        .link-green {
            color: #15803d;
            font-weight: 500;
            text-decoration: none;
        }
        .link-green:hover {
            color: #16a34a;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center min-vh-100 px-3">

    <div class="card-auth">

        <div class="d-flex align-items-center justify-content-center mb-4">
            <img src="{{ asset('image/logo.jpg') }}"
                 alt="Logo"
                 class="rounded-circle me-3"
                 style="width:64px;height:64px;object-fit:cover;">
            <h1 class="h4 fw-bold text-uppercase text-dark">Cây Nhà Trồng</h1>
        </div>

        <h2 class="h4 fw-semibold text-center mb-1 text-dark">Tạo tài khoản mới</h2>

        {{-- Hiển thị lỗi chung --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại (tuỳ chọn)</label>
                <input type="text" name="phone" class="form-control"
                       value="{{ old('phone') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Địa chỉ giao hàng (tuỳ chọn)</label>
                <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
            </div>

            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-primary-custom py-2">
                    Đăng ký
                </button>
            </div>
        </form>

        <div class="text-center mt-2">
            <span class="text-muted">Đã có tài khoản?</span>
            <a href="{{ route('login') }}" class="link-green">Đăng nhập</a>
        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
