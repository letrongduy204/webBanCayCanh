<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cây Nhà Trồng - Danh sách sản phẩm</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts + Icons -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <style>
    nav {
  pointer-events: none !important;
}

    body { font-family: 'Inter', sans-serif; }
    .navbar-custom { background-color: #dff5d1 !important; }
    .topbar { background: #2c3e50; color: #fff; }

    .product-card{
      border-radius: 14px;
      overflow: hidden;
      box-shadow: 0 6px 16px rgba(0,0,0,.08);
      border: 1px solid rgba(0,0,0,.06);
      transition: transform .15s ease, box-shadow .15s ease;
      background: #fff;
    }


    .product-card:hover{
      transform: translateY(-2px);
      box-shadow: 0 10px 22px rgba(0,0,0,.12);
    }
    .product-img{
      height: 170px;
      width: 100%;
      object-fit: cover;
    }
    .product-name{
      font-weight: 600;
      color: #1f2937;
      margin-bottom: 6px;
      min-height: 42px;
    }
    .product-price{
      color: #047857;
      font-weight: 800;
    }
  </style>
</head>

<body class="bg-light">


    @include('layouts.navbar')


    @include('layouts.MenuNavbar')







<main class="container py-4" style="max-width:1200px;">
  <div class="d-flex justify-content-between align-items-end border-bottom pb-2 mb-4">
    <h2 class="fw-bold m-0">Sản phẩm</h2>
    <a class="text-success fw-semibold text-decoration-none" href="{{ route('caycanh.index') }}">Xem tất cả</a>
  </div>

  <div class="row g-4">
  @forelse($products as $p)

    @php
      $img = $p->HinhAnhURL
        ? asset(ltrim($p->HinhAnhURL, '/'))
        : 'https://via.placeholder.com/600x450?text=Plant';
    @endphp

    <div class="col-12 col-sm-6 col-lg-3">
      <a href="{{ route('caycanh.show', $p->SanPhamID) }}"
         class="text-decoration-none text-dark d-block h-100">

        <div class="product-card h-100">
          <img src="{{ $img }}" class="product-img" alt="{{ $p->TenSanPham }}">

          <div class="p-3 text-center">
            <div class="product-name">{{ $p->TenSanPham }}</div>
            <div class="product-price">
              {{ number_format($p->GiaBan, 0, ',', '.') }}đ
            </div>
          </div>
        </div>

      </a>
    </div>

  @empty
    <div class="col-12">
      <div class="alert alert-info mb-0">Không có sản phẩm nào.</div>
    </div>
  @endforelse
</div>
  <div class="d-flex justify-content-center mt-4">
    {{ $products->links('pagination::bootstrap-5') }}
  </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
