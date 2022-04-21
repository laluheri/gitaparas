<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klasifikasi extends Model
{
    use HasFactory;

    protected $table = "klasifikasi";

    protected $fillable = ["kode", "nama"];
}
