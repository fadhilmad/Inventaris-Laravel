<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('unit_kerja');
            $table->string('nama_inventaris');
            $table->integer('jumlah_inventaris');
            $table->string('satuan');
            $table->string('jenis_pengajuan');
            $table->tinyInteger('validasi_ketua')->default('0');
            $table->tinyInteger('validasi_wr')->default('0');
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
        Schema::dropIfExists('pengajuan_inventaris');
    }
}
