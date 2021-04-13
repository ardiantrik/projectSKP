<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $fillable = ['nama_jabatan','subbidang_id'];
    use HasFactory;
}
