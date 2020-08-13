<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rtreportupdate2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interpretations', function (Blueprint $table) {
            $table->string("drawing_no")->nullable();
            $table->string("line_no")->nullable();
            $table->string("length_thick")->nullable();
            $table->string("interpret_size")->nullable();
            $table->string("interpret_dis")->nullable();
            $table->unsignedBigInteger("m_p_t_report_id");
            $table->index("m_p_t_report_id");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interpretations', function (Blueprint $table) {
            $table->dropColumn("drawing_no");
            $table->dropColumn("line_no");
            $table->dropColumn("length_thick");
            $table->dropColumn("interpret_size");
            $table->dropColumn("interpret_dis");
            $table->dropColumn("m_p_t_report_id");
        });
    }
}
