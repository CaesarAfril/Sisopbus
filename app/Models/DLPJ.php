<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DLPJ extends Model
{
    use HasFactory;
    protected $table = 'tb_laporanperjalanan';
    protected $fillable = ['kilometer','konsumsi','ban','kondisi','id_laporan','id_rute'];
}
