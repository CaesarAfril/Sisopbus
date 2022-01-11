<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DA extends Model
{
    use HasFactory;
    protected $table = 'tb_admin';
    protected $fillable = ['username','nama','email','password','foto','UQ'];
}
