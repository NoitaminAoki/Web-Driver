<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('barang_id')->unsigned();
            $table->string('jenis_mobil', 100);
            $table->string('spv_hunter');
            $table->string('tujuan');
            $table->string('nama_juragan');
            $table->string('nama_toko');
            $table->string('nama_pemilik_toko');
            $table->string('no_handphone', 25);
            $table->integer('qty_barang');
            $table->string('satuan_barang', 20);
            $table->string('photo_juragan_ttd');
            $table->string('photo_ktp_barcode_adr');
            $table->string('photo_juragan_cabinet');
            $table->string('photo_ktp');
            $table->timestamp('added_on');
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
        Schema::dropIfExists('laporans');
    }
}
