<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdepartment extends Model
{
    protected $fillable = ['nama_subbidang','bidang_id'];
    use HasFactory;
}
