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
        Schema::table('switch', function (Blueprint $table) {
            $table->enum('sw_status',['Aktif', 'Rusak','Mati'])->after('sw_keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('switch', function (Blueprint $table) {
            $table->dropColumn('sw_status');
        });
    }
};
