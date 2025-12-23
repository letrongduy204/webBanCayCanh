@extends('layouts.bodyOne')

@section('content')
<div class="container py-4">
    <h4 class="fw-bold mb-3">Đơn hàng của tôi</h4>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width:110px;">Mã</th>
                        <th>Ngày đặt</th>
                        <th class="text-end" style="width:170px;">Tổng tiền</th>
                        <th style="width:160px;">Trạng thái</th>
                        <th style="width:140px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $o)
                        <tr>
                            <td>#{{ $o->DonHangID }}</td>
                            <td>{{ $o->NgayDatHang }}</td>
                            <td class="text-end fw-bold text-danger">
                                {{ number_format($o->TongTien, 0, ',', '.') }} ₫
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $o->TrangThaiDonHang }}</span>
                            </td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-primary"
                                   href="{{ route('order.show', $o->DonHangID) }}">
                                    Xem
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">Chưa có đơn hàng.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer bg-light d-flex justify-content-end">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
