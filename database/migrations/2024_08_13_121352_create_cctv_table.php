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
        Schema::create('cctv', function (Blueprint $table) {
            $table->id('id_cctv');
            $table->integer('id_kodecctv')->nullable();
            $table->string('cctv_number')->nullable();
            $table->string('cctv_mac')->nullable();
            $table->string('cctv_ip')->nullable();
            $table->string('cctv_auth')->nullable();
            $table->enum('cctv_type',['Indoor','Outdoor'])->nullable()->default('Indoor');
            $table->integer('id_lokasi')->nullable();
            $table->string('cctv_lokasi')->nullable();
            $table->integer('id_vendor')->nullable();
            $table->integer('id_pengadaan')->nullable();
            $table->string('cctv_keterangan')->nullable();
            $table->enum('cctv_status',['Aktif','Rusak','Mati'])->nullable()->default('Aktif');
            $table->string('cctv_image')->nullable();
            $table->string('cctv_backup')->nullable();
            $table->string('cctv_author')->nullable();
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
        Schema::dropIfExists('cctv');
    }
};
