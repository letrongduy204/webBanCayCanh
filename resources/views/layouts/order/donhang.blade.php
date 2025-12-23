@extends('layouts.bodyOne')

@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="fw-bold mb-0">🧾 Đơn hàng #{{ $order->DonHangID }}</h4>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">← Về trang chủ</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <div class="fw-bold mb-2">Thông tin người nhận</div>
                        <div><span class="text-muted">Tên:</span> {{ $order->TenNguoiNhan }}</div>
                        <div><span class="text-muted">SĐT:</span> {{ $order->DienThoaiNguoiNhan }}</div>
                        <div><span class="text-muted">Địa chỉ:</span> {{ $order->DiaChiGiaoHang }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-light rounded">
                        <div class="fw-bold mb-2">Thông tin đơn hàng</div>
                        <div><span class="text-muted">Ngày đặt:</span> {{ $order->NgayDatHang }}</div>
                        <div><span class="text-muted">Phương thức:</span> {{ $order->PhuongThucThanhToan }}</div>

                        <div class="mt-2">
                            <span class="text-muted">Trạng thái đơn:</span>
                            <span class="badge bg-warning text-dark">{{ $order->TrangThaiDonHang }}</span>
                        </div>

                        <div class="mt-2">
                            <span class="text-muted">Thanh toán:</span>
                            <span class="badge bg-secondary">{{ $order->TrangThaiThanhToan }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-flex align-items-center justify-content-between p-3 border rounded">
                        <div class="fw-bold">Tổng tiền</div>
                        <div class="fs-4 fw-bold text-danger">
                            {{ number_format($order->TongTien, 0, ',', '.') }} ₫
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 d-flex gap-2">
                <a href="{{ route('caycanh.index') }}" class="btn btn-primary">
                    Tiếp tục mua sắm
                </a>
                {{-- Tuỳ chọn: nút xem danh sách đơn --}}
                <a href="{{ route('order.my') }}" class="btn btn-outline-primary">
                    Xem đơn hàng của tôi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
