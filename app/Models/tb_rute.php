<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_rute extends Model
{
    use HasFactory;
    protected $table = ['tb_rute'];
    protected $fillable = ['kode','kota_asal','kota_tujuan','jalur','status'];
}
