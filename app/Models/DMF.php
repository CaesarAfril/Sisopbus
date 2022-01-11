<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMF extends Model
{
    use HasFactory;
    protected $table = 'tb_manufaktur';
    protected $fillable = ['nama'];
}
