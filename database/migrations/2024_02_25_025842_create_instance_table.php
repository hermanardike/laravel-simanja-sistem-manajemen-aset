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
        Schema::create('instance', function (Blueprint $table) {
            $table->id('id_instance');
            $table->string('instance_name');
            $table->string('instance_ip')->unique();
            $table->string('instance_auth');
            $table->text('instance_spec');
            $table->string('instance_owner');
            $table->string('instance_domain');
            $table->enum('instance_status',['Active','Deactivate','Deleted','Suspended']);
            $table->text('instance_keterangan');
            $table->integer('id_os');
            $table->integer('id_host');
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
        Schema::dropIfExists('instance');
    }
};
