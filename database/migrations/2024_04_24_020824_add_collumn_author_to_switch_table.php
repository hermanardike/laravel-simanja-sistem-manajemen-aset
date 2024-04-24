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
            $table->string('sw_author')->nullable()->after('sw_backup');
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
            $table->dropColumn('author');
        });
    }
};
