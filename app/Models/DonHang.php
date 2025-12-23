<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'DonHangID';
    public $timestamps = false;

    protected $fillable = [
        'TaiKhoanID',
        'NgayDatHang',
        'TongTien',
        'TrangThaiDonHang',
        'TenNguoiNhan',
        'DiaChiGiaoHang',
        'DienThoaiNguoiNhan',
        'PhuongThucThanhToan',
        'TrangThaiThanhToan',
    ];
}
