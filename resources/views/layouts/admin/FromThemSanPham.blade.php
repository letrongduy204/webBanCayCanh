<div class="card shadow-sm border-0 mb-3">
    <div class="card-body py-3">

        <div class="d-flex align-items-center mb-2">
            <h6 class="mb-0 fw-bold">THÊM SẢN PHẨM MỚI</h6>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-2">
                <div class="col-12 col-lg-6">
                    <label class="form-label fw-semibold mb-1">Tên sản phẩm</label>
                    <input name="TenSanPham" value="{{ old('TenSanPham') }}"
                           class="form-control form-control-sm" placeholder="VD: Cây Trầu Bà">
                </div>

                <div class="col-6 col-lg-3">
                    <label class="form-label fw-semibold mb-1">Mã SKU</label>
                    <input name="MaSKU" value="{{ old('MaSKU') }}"
                           class="form-control form-control-sm" placeholder="VD: CAY031">
                </div>

                <div class="col-6 col-lg-3">
                    <label class="form-label fw-semibold mb-1">Loại cây</label>
                    <select name="LoaiCayID" class="form-select form-select-sm">
                        <option value="">Chọn loại...</option>
                        @foreach($loaiCays as $lc)
                            <option value="{{ $lc->LoaiCayID }}"
                                @if(old('LoaiCayID') == $lc->LoaiCayID) selected @endif>
                                {{ $lc->TenLoai }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-2 mt-1">
                <div class="col-6 col-lg-3">
                    <label class="form-label fw-semibold mb-1">Giá (VNĐ)</label>
                    <input type="number" min="0" name="GiaBan" value="{{ old('GiaBan', 0) }}"
                           class="form-control form-control-sm">
                </div>

                <div class="col-6 col-lg-2">
                    <label class="form-label fw-semibold mb-1">Số lượng</label>
                    <input type="number" min="0" name="SoLuongTonKho" value="{{ old('SoLuongTonKho', 0) }}"
                           class="form-control form-control-sm">
                </div>

                <div class="col-12 col-lg-3">
                    <label class="form-label fw-semibold mb-1">Trạng thái</label>
                    @php $st = old('TrangThai', 'Còn hàng'); @endphp
                    <select name="TrangThai" class="form-select form-select-sm">
                        <option value="Còn hàng" {{ $st=='Còn hàng'?'selected':'' }}>Còn hàng</option>
                        <option value="Hết hàng" {{ $st=='Hết hàng'?'selected':'' }}>Hết hàng</option>
                        <option value="Đang bán" {{ $st=='Đang bán'?'selected':'' }}>Đang bán</option>
                        <option value="Ngừng kinh doanh" {{ $st=='Ngừng kinh doanh'?'selected':'' }}>Ngừng kinh doanh</option>
                    </select>
                </div>

                <div class="col-12 col-lg-4">
                    <label class="form-label fw-semibold mb-1">Hình ảnh</label>
                    <input type="file" name="HinhAnhUpload" class="form-control form-control-sm" accept="image/*">
                </div>
            </div>

            <div class="row g-2 mt-1 align-items-end">
                <div class="col-12 col-lg-9">
                    <label class="form-label fw-semibold mb-1">Mô tả</label>
                    <textarea name="MoTa" rows="2" class="form-control form-control-sm"
                              placeholder="Mô tả ngắn...">{{ old('MoTa') }}</textarea>
                </div>

                <div class="col-12 col-lg-3 d-grid">
                    <button class="btn btn-warning btn-sm fw-bold" type="submit">
                        Thêm sản phẩm
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
