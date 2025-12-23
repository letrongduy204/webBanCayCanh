<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua San Pham</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>
<body>
    @include('layouts.navbar')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h5 class="mb-0 fw-bold">Sửa sản phẩm #{{ $product->SanPhamID }}</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.products.update', $product->SanPhamID) }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label fw-semibold">Tên sản phẩm</label>
                        <input name="TenSanPham" class="form-control"
                               value="{{ old('TenSanPham', $product->TenSanPham) }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label fw-semibold">SKU</label>
                        <input name="MaSKU" class="form-control"
                               value="{{ old('MaSKU', $product->MaSKU) }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label fw-semibold">Loại cây</label>
                        <select name="LoaiCayID" class="form-select">
                            <option value="">Chọn loại...</option>
                            @foreach($loaiCays as $lc)
                                <option value="{{ $lc->LoaiCayID }}"
                                    @if(old('LoaiCayID', $product->LoaiCayID) == $lc->LoaiCayID) selected @endif>
                                    {{ $lc->TenLoai }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6 col-md-3">
                        <label class="form-label fw-semibold">Giá</label>
                        <input type="number" min="0" name="GiaBan" class="form-control"
                               value="{{ old('GiaBan', $product->GiaBan) }}">
                    </div>

                    <div class="col-6 col-md-3">
                        <label class="form-label fw-semibold">Số lượng</label>
                        <input type="number" min="0" name="SoLuongTonKho" class="form-control"
                               value="{{ old('SoLuongTonKho', $product->SoLuongTonKho) }}">
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label fw-semibold">Trạng thái</label>
                        <select name="TrangThai" class="form-select">
                            @php $st = old('TrangThai', $product->TrangThai); @endphp
                            <option value="Còn hàng" {{ $st=='Còn hàng'?'selected':'' }}>Còn hàng</option>
                            <option value="Hết hàng" {{ $st=='Hết hàng'?'selected':'' }}>Hết hàng</option>
                            <option value="Đang bán" {{ $st=='Đang bán'?'selected':'' }}>Đang bán</option>
                            <option value="Ngừng kinh doanh" {{ $st=='Ngừng kinh doanh'?'selected':'' }}>Ngừng kinh doanh</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-3">
                        <label class="form-label fw-semibold">Đổi ảnh</label>
                        <input type="file" name="HinhAnhUpload" class="form-control" accept="image/*">
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Mô tả</label>
                        <textarea name="MoTa" rows="3" class="form-control">{{ old('MoTa', $product->MoTa) }}</textarea>
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <a class="btn btn-outline-secondary" href="{{ route('admin.products') }}">Quay lại</a>
                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
