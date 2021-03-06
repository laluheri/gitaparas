<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsip';
    protected $fillable = [
        "no_surat",
        "asal_surat",
        "isi",
        "kode",
        "tgl_surat",
        "tgl_terima",
        "filemasuk",
        "keterangan",
        "users_id",
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class,'klasifikasi_id', 'id');
    }
}
