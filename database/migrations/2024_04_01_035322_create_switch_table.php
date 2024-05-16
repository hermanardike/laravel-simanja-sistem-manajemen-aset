<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('switch', function (Blueprint $table) {
            $table->id('id_switch');
            $table->string('sw_name')->nullable();
            $table->string('sw_ip')->nullable();
            $table->string('sw_auth')->nullable();
            $table->text('sw_uplink')->nullable();
            $table->integer('id_lokasi');
            $table->string('sw_lokasi');
            $table->integer('id_vendor');
            $table->integer('id_pengadaan');
            $table->text('sw_keterangan')->nullable();
            $table->string('sw_image')->nullable();
            $table->string('sw_backup')->nullable();
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
        Schema::dropIfExists('switch');
    }
};
