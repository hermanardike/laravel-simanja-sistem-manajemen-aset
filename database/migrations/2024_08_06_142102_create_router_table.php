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
        Schema::create('router', function (Blueprint $table) {
            $table->id('id_router');
            $table->string('r_name')->nullable();
            $table->string('r_ip')->nullable();
            $table->string('r_auth')->nullable();
            $table->integer('id_lokasi')->nullable();
            $table->string('r_lokasi')->nullable();
            $table->integer('id_vendor')->nullable();
            $table->integer('id_pengadaan')->nullable();
            $table->string('r_keterangan')->nullable();
            $table->enum('r_status',['Aktif','Rusak','Mati'])->nullable()->default('Aktif');
            $table->string('r_image')->nullable();
            $table->string('r_backup')->nullable();
            $table->string('r_author')->nullable();
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
        Schema::dropIfExists('router');
    }
};
