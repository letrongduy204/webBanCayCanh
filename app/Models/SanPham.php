<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
        protected $table = 'sanpham';
    protected $primaryKey = 'SanPhamID';

    protected $fillable = [
        'MaSKU',
        'TenSanPham',
        'MoTa',
        'GiaBan',
        'SoLuongTonKho',
        'LoaiCayID',
        'HinhAnhURL',
        'TrangThai',
    ];
}
