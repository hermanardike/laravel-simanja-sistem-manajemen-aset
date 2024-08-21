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
        Schema::create('domain', function (Blueprint $table) {
            $table->id('id_domain');
            $table->string('domain_name')->nullable();
            $table->integer('id_sub')->nullable();
            $table->enum('domain_type',['aplikasi','website','journal'])->nullable()->default('website');
            $table->integer('id_lokasi')->nullable();
            $table->string('domain_ip')->nullable();
            $table->string('domain_owner')->nullable();
            $table->string('domain_kontak')->nullable();
            $table->string('domain_email')->nullable();
            $table->integer('id_pengadaan')->nullable();
            $table->string('upload_surat')->nullable();
            $table->text('domain_keterangan')->nullable();
            $table->enum('domain_status',['aktif','suspend'])->nullable()->default('aktif');
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
        Schema::dropIfExists('domain_tables');
    }
};
