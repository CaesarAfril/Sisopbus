<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DLWT extends Model
{
    use HasFactory;
    protected $table = 'tb_laporanperawatan';
    protected $fillable = ['bagian','jenis','tanggal','keterangan','id_laporan'];
}
