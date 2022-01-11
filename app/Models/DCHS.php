<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCHS extends Model
{
    use HasFactory;
    protected $table = 'tb_chassis';
    protected $fillable = ['nama','mesin','jenis_transmisi','transmisi','suspensi','id_man'];
}
