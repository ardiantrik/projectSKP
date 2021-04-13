<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobdescription extends Model
{
    protected $fillable = ['tugas','jabatan_id'];
    use HasFactory;
}
