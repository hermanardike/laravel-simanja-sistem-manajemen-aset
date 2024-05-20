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
            $table->string('id_kode')->nullable()->default('1');
            $table->string('ap_number')->nullable()->default('0');
            $table->string('mac_address')->nullable()->unique();
            $table->string('id_lokasi')->nullable()->default('0');
            $table->string('ap_lokasi')->nullable()->default('UnDeployed  4');

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
