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
        Schema::create('ipaddress', function (Blueprint $table) {
            $table->id('id_ipaddress');
            $table->string('ip_address')->nullable();
            $table->enum('ip_type',['PUBLIC','LOCAL'])->nullable()->default('PUBLIC');
            $table->integer('id_network');
            $table->string('ip_details')->nullable();
            $table->enum('ip_status',['USED','AVAILABLE'])->nullable()->default('AVAILABLE');
            $table->string('ip_owner')->nullable();
            $table->string('ip_contact')->nullable();
            $table->string('author')->nullable();
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
        Schema::dropIfExists('ipaddress');
    }
};
