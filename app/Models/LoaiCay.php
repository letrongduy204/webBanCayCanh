<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiCay extends Model
{
    protected $table = 'loaicay';
    protected $primaryKey = 'LoaiCayID';
    public $timestamps = false;

    protected $fillable = ['TenLoai', 'MoTa'];
}
