<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Login - Plant Store</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            margin: 0;
            position: relative;
            color: #1e293b;
        }

        
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: url('{{ asset("image/nen1.jpg") }}'); /* Đổi thành ảnh của bạn */
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

        .login-card {
            max-width: 420px;
            width: 100%;
            background-color: rgba(248, 250, 252, 0.95);
            border-radius: 0.75rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
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

    <div class="login-card">

        <!-- Logo -->
        <div class="d-flex align-items-center justify-content-center mb-4">
            <img src="{{ asset('image/logo.jpg') }}"
                 alt="Logo"
                 class="rounded-circle me-3"
                 style="width:64px; height:64px; object-fit:cover;">
            <h1 class="h3 fw-bold text-uppercase text-dark">Cây Nhà Trồng</h1>
        </div>

        <h2 class="h4 fw-semibold text-center mb-1 text-dark">Đăng nhập</h2>
        

        <!-- Form -->
        <form action="{{ route('login.process') }}" method="POST">
    @csrf

    @if ($errors->has('login'))
        <div class="alert alert-danger text-center">
            {{ $errors->first('login') }}
        </div>
    @endif

    <div class="mb-3">
        <label class="form-label">User ID</label>
        <input type="text"
               name="userid"
               class="form-control"
               value="{{ old('userid') }}"
               required>
    </div>

    <div class="mb-4">
        <label class="form-label">Password</label>
        <input type="password"
               name="password"
               class="form-control"
               required>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary-custom py-2">
            Login
        </button>
    </div>
    </form>


        @if(session('success'))
            <div class="alert alert-success text-center mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- Links -->
        <div class="text-center mt-3">
            <a class="link-green" href="{{ route('register') }}">Đăng ký</a>
            <span class="text-muted mx-2">·</span>
            <a href="#" class="link-green">Bạn quên mật khẩu ?</a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
