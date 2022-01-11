<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DLPR extends Model
{
    use HasFactory;
    protected $table = 'tb_laporan';
    protected $fillable = ['tanggal','operasional','status','id_bus'];
}
