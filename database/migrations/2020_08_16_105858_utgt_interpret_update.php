<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UtgtInterpretUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('utgt_interpretations', function (Blueprint $table) {
            $table->string("base_line_reading")->nullable();
            $table->string("length")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utgt_interpretations', function (Blueprint $table) {
            $table->dropColumn("base_line_reading");
            $table->dropColumn("length");
        });
    }
}
