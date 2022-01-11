<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DBU extends Model
{
    use HasFactory;
    protected $table = 'tb_bus';
    protected $fillable = ['kode','tipe','password','tahun','kilometer','foto','id_chassis','id_man'];
}
