<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
        protected $table = 'taikhoan';
    protected $primaryKey = 'TaiKhoanID';
    public $timestamps = false; 
    protected $fillable = [
        'MaDinhDanh',
        'Email',
        'MatKhau',
        'HoTen',
        'LoaiTaiKhoan',
        'DienThoai',
        'DiaChiGiaoHangMacDinh',
        'NgayTao',
    ];
}
