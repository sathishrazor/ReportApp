<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UtcReportUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('u_t_c_reports', function (Blueprint $table) {
            $table->string("drawing_no")->nullable();

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
        Schema::table('u_t_c_reports', function (Blueprint $table) {
            $table->dropColumn('drawing_no');
        });
    }
}
