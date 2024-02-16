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
        Schema::create('servers', function (Blueprint $table) {
           $table->id('id_srv');
            $table->string('srv_name');
            $table->string('srv_ip')->unique();
            $table->string('srv_auth')->nullable();
            $table->text('srv_spec')->nullable();
            $table->string('srv_owner')->nullable();
            $table->integer('id_pengadaan')->nullable();
            $table->integer('id_rack')->nullable();
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
        Schema::dropIfExists('servers');
    }
};
