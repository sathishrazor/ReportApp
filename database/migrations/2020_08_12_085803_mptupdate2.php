<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mptupdate2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('m_p_t_reports', function (Blueprint $table) {
            //
            $table->string("weld_reinforcement")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('m_p_t_reports', function (Blueprint $table) {

            $table->dropColumn("weld_reinforcement");
        });
    }
}
