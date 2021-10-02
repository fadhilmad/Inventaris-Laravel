<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenghapusanInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penghapusan_inventaris', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_daftar_inventaris');
            $table->integer('jumlah_hapus');
            $table->string('keterangan');
            $table->smallInteger('validasi_ketua')->default('0');
            $table->foreign('id_daftar_inventaris')->references('id')->on('daftar_inventaris')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penghapusan_inventaris');
    }
}
