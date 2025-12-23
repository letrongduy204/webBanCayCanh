<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $product->TenSanPham }} - Cây Nhà Trồng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .topbar {
        background: #2c3e50;
        color: #fff;
    }

    .navbar-custom {
        background-color: #dff5d1 !important;
    }

    .product-img-lg {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 16px;
    }

    .price {
        color: #047857;
        font-weight: 800;
    }

    .related-card {
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 6px 16px rgba(0, 0, 0, .08);
        border: 1px solid rgba(0, 0, 0, .06);
        transition: transform .15s ease, box-shadow .15s ease;
        background: #fff;
    }

    .related-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 22px rgba(0, 0, 0, .12);
    }

    .related-img {
        height: 160px;
        width: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body class="bg-light">

    @include ('layouts.navbar')
    <!-- <header class="topbar">
  <div class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
      <div class="fw-bold text-uppercase">Cây Nhà Trồng</div>
      <a href="{{ route('caycanh.index') }}" class="btn btn-outline-light btn-sm">← Quay lại</a>
    </div>
  </div>
</header> -->

    <nav class="navbar navbar-expand-lg navbar-custom border-bottom sticky-top">
        <div class="container" style="max-width: 1200px;">
            <a class="navbar-brand fw-bold text-success" href="{{ route('caycanh.index') }}">Cây Cảnh</a>
        </div>
    </nav>

    <main class="container py-4" style="max-width:1200px;">
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                @php
                $img = $product->HinhAnhURL
                ? asset(ltrim($product->HinhAnhURL, '/'))
                : 'https://via.placeholder.com/900x700?text=Plant';
                @endphp
                <img src="{{ $img }}" class="product-img-lg" alt="{{ $product->TenSanPham }}">
            </div>

            <div class="col-12 col-lg-6">
                <h2 class="fw-bold">{{ $product->TenSanPham }}</h2>

                <div class="fs-3 price mb-2">
                    {{ number_format($product->GiaBan, 0, ',', '.') }}đ
                </div>

                <div class="mb-3">
                    <span class="badge text-bg-success">{{ $product->TrangThai }}</span>
                    <span class="badge text-bg-secondary ms-1">Kho: {{ $product->SoLuongTonKho }}</span>
                </div>

                <div class="bg-white p-3 rounded-4 border">
                    <div class="fw-semibold mb-2">Mô tả</div>
                    <div class="text-muted">
                        {{ $product->MoTa ?: 'Chưa có mô tả cho sản phẩm này.' }}
                    </div>
                </div>

                <div class="d-flex gap-2 mt-4">

                    <button class="btn btn-outline-success btn-lg w-100">Liên hệ ngây</button>
                </div>
                <div class="d-flex gap-2 mt-4">
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->SanPhamID }}">
                        <button class="btn btn-warning fw-bold" type="submit">Thêm giỏ hàng</button>
                    </form>


                </div>
            </div>
        </div>

        @if($related->count())
        <div class="mt-5">
            <h4 class="fw-bold mb-3">Sản phẩm liên quan</h4>
            <div class="row g-3">
                @foreach($related as $r)
                @php
                $rimg = $r->HinhAnhURL ? asset(ltrim($r->HinhAnhURL, '/')) :
                'https://via.placeholder.com/600x450?text=Plant';
                @endphp
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ route('caycanh.show', $r->SanPhamID) }}" class="text-decoration-none text-dark">
                        <div class="related-card h-100">
                            <img src="{{ $rimg }}" class="related-img" alt="{{ $r->TenSanPham }}">
                            <div class="p-3 text-center">
                                <div class="fw-semibold" style="min-height:42px;">{{ $r->TenSanPham }}</div>
                                <div class="price">{{ number_format($r->GiaBan, 0, ',', '.') }}đ</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>