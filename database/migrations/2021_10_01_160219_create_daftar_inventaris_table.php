<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja');
            $table->string('nama_inventaris');
            $table->integer('jumlah_inventaris');
            $table->string('satuan');
            $table->integer('tahun');
            $table->string('keterangan_inventaris');
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
        Schema::dropIfExists('daftar_inventaris');
    }
}
