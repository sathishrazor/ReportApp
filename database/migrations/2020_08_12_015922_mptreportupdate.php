<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mptreportupdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_p_t_reports', function (Blueprint $table) {
            //
            $table->string("photo_1")->nullable();
            $table->string("photo_2")->nullable();
            $table->string("drawing")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('m_p_t_reports', function (Blueprint $table) {
            //
            $table->dropColumn("photo_1");
            $table->dropColumn("photo_2");
            $table->dropColumn("drawing");
        });
    }
}
