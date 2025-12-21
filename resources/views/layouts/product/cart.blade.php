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
