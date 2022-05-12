<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('klasifikasi_id');
            $table->String('no_surat');
            $table->String('asal_surat');
            $table->String('isi');
            $table->String('tgl_surat');
            $table->String('tgl_terima');
            $table->String('tgl_arsip');
            $table->String('tgl_kadaluarsa');
            $table->String('file');
            $table->String('keterangan');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('klasifikasi_id')->references('id')->on('klasifikasi');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip');
    }
}
