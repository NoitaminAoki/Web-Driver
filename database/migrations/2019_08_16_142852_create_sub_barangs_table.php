<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('laporan_id')->unsigned()->nullable();
            $table->string('nama_sub_barang', 100);
            $table->integer('qty');
            $table->string('satuan', 50);
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
        Schema::dropIfExists('sub_barangs');
    }
}
