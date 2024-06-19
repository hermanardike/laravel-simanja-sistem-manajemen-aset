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
        Schema::create('accespoint', function (Blueprint $table) {
            $table->id('id_ap');
            $table->integer('id_kode')->nullable()->default('1');
            $table->string('ap_number')->nullable()->default('30');
            $table->string('ap_mac')->nullable()->unique();
            $table->integer('id_lokasi')->nullable()->default('1');
            $table->string('ap_lokasi')->nullable()->default('UnDeployed');
            $table->integer('id_vendor')->nullable()->default('1');
            $table->integer('id_pengadaan')->nullable()->default('1');
            $table->string('ap_image')->nullable();
            $table->enum('ap_status',['Aktif','Rusak','Mati'])->nullable()->default('Aktif');
            $table->text('ap_keterangan')->nullable();
            $table->string('ap_author')->nullable()->default('Admin');
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
        Schema::dropIfExists('accespoint');
    }
};
