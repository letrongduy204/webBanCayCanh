<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.navbar')

    <div class="container py-4">
        <h4 class="fw-bold mb-3">Giỏ hàng</h4>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(empty($items))
        <div class="alert alert-warning mb-0">Giỏ hàng đang trống.</div>
        @else


        <form action="{{ route('cart.update') }}" method="POST">
            @csrf

            <div class="card shadow-sm border-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Sản phẩm</th>
                                <th style="width:140px;" class="text-end">Giá</th>
                                <th style="width:140px;" class="text-center">Số lượng</th>
                                <th style="width:160px;" class="text-end">Thành tiền</th>
                                <th style="width:100px;" class="text-end">Xóa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($items as $it)
                            @php
                            $p = $it['p'];
                            $img = $p->HinhAnhURL ? asset(ltrim($p->HinhAnhURL, '/')) : null;
                            @endphp

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded border bg-light overflow-hidden"
                                            style="width:56px;height:56px;">
                                            @if($img)
                                            <img src="{{ $img }}" style="width:100%;height:100%;object-fit:cover;"
                                                alt="">
                                            @endif
                                        </div>
                                        <div>
                                            <div class="fw-semibold">{{ $p->TenSanPham }}</div>
                                            <div class="text-muted small">SKU: {{ $p->MaSKU }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-end fw-semibold">
                                    {{ number_format($p->GiaBan, 0, ',', '.') }} ₫
                                </td>

                                <td class="text-center">
                                    <input type="number" min="0" class="form-control text-center"
                                        name="qty[{{ $p->SanPhamID }}]" value="{{ $it['qty'] }}">
                                    <div class="text-muted small mt-1">0 = xóa</div>
                                </td>

                                <td class="text-end fw-semibold">
                                    {{ number_format($it['line'], 0, ',', '.') }} ₫
                                </td>

                                <td class="text-end">

                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                        form="remove-{{ $p->SanPhamID }}">
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end fw-bold">Tổng tiền</td>
                                <td class="text-end fw-bold">{{ number_format($total, 0, ',', '.') }} ₫</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                
            </div>
        </form>
        <div class="card-footer bg-light d-flex flex-column flex-md-row gap-2 justify-content-between">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning">
                            Cập nhật giỏ hàng
                        </button>
                    </div>


                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success fw-bold">
                            Thanh toán
                        </button>
                    </form>
                </div>
        @foreach($items as $it)
        <form id="remove-{{ $it['p']->SanPhamID }}" action="{{ route('cart.remove', $it['p']->SanPhamID) }}"
            method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>
        @endforeach


        @endif
    </div>

</body>

</html>