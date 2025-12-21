<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm nổi bật</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Sản phẩm nổi bật</h2>
        <a href="#" class="text-success fw-semibold">Xem tất cả</a>
    </div>

    <div class="row g-4">
    @if(isset($products) && $products->count())
        @foreach($products as $p)
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card shadow-sm h-100">

                <img src="{{ $p->HinhAnhURL }}" class="card-img-top" height="200" style="object-fit:cover;">

                <div class="card-body">
                    <h5 class="card-title">{{ $p->TenSanPham }}</h5>
                    <p class="text-success fw-bold fs-5">{{ number_format($p->GiaBan) }}đ</p>
                </div>

            </div>
        </div>
        @endforeach
        @else
            <p>Chưa có sản phẩm nổi bật.</p>
        @endif

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
