<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InterpretUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('interpretations', function (Blueprint $table) {
            //
            $table->unsignedBigInteger("l_p_t_report_id")->nullable();
            $table->unsignedBigInteger("u_t_a_report_id")->nullable();
            $table->unsignedBigInteger("u_t_c_report_id")->nullable();
            $table->unsignedBigInteger("u_t_g_t_report_id")->nullable();

            $table->index("l_p_t_report_id");
            $table->index("u_t_a_report_id");
            $table->index("u_t_c_report_id");
            $table->index("u_t_g_t_report_id");
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
    }
}
