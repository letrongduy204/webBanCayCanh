<div class="card shadow-sm border-0">
    <div class="card-header bg-light d-flex align-items-center justify-content-between">
        <h6 class="mb-0 fw-bold">Danh sách sản phẩm</h6>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th style="width:70px;">ID</th>
                    <th style="width:110px;">SKU</th>
                    <th>Tên sản phẩm</th>
                    <th style="width:170px;">Loại</th>
                    <th class="text-end" style="width:140px;">Giá</th>
                    <th class="text-center" style="width:90px;">SL</th>
                    <th class="text-center" style="width:140px;">Trạng thái</th>
                    <th style="width:90px;"></th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $p)
                    @php
                        $qty = (int)($p->SoLuongTonKho ?? 0);
                        $qtyClass = $qty == 0 ? 'danger' : ($qty <= 5 ? 'warning text-dark' : 'primary');

                        $status = $p->TrangThai ?? '';
                        $statusClass = str_contains(mb_strtolower($status), 'hết')
                            ? 'secondary'
                            : (str_contains(mb_strtolower($status), 'ngừng') ? 'danger' : 'success');

                        $img = $p->HinhAnhURL ? asset(ltrim($p->HinhAnhURL, '/')) : null;
                    @endphp

                    <tr>
                        <td class="text-muted">#{{ $p->SanPhamID }}</td>
                        <td class="font-monospace text-muted">{{ $p->MaSKU }}</td>

                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded bg-light border overflow-hidden" style="width:44px;height:44px;">
                                    @if($img)
                                        <img src="{{ $img }}" alt="{{ $p->TenSanPham }}"
                                             style="width:100%;height:100%;object-fit:cover;">
                                    @endif
                                </div>
                                <div class="fw-semibold">{{ $p->TenSanPham }}</div>
                            </div>
                        </td>

                        <td class="text-muted">{{ $p->TenLoai ?? '—' }}</td>

                        <td class="text-end fw-semibold">{{ number_format($p->GiaBan, 0, ',', '.') }} ₫</td>

                        <td class="text-center">
                            <span class="badge bg-{{ $qtyClass }}">{{ $qty }}</span>
                        </td>

                        <td class="text-center">
                            <span class="badge bg-{{ $statusClass }}">{{ $status }}</span>
                        </td>

                        <td class="text-end">
                            <td class="text-end">
    <a class="btn btn-sm btn-outline-primary"
       href="{{ route('admin.products.edit', $p->SanPhamID) }}">
        <i class="fa-regular fa-pen-to-square"></i>
    </a>

    <form action="{{ route('admin.products.destroy', $p->SanPhamID) }}"
          method="POST" class="d-inline"
          onsubmit="return confirm('Xóa sản phẩm này nhé?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-sm btn-outline-danger" type="submit">
            <i class="fa-regular fa-trash-can"></i>
        </button>
    </form>
</td>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Chưa có sản phẩm.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer bg-light d-flex justify-content-end">
        {{ $products->links() }}
    </div>
</div>
