<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
    protected $fillable = ['nama','jabatan_id','user_id'];
    use HasFactory;
}
