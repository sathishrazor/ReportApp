<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UtaInterpretUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('uta_interpretations', function (Blueprint $table) {

        $table->string("defect_no")->nullable();
        $table->string("from_datum")->nullable();
        $table->string("defect_length")->nullable();
        $table->string("beam_path")->nullable();
        $table->string("skip_distance")->nullable();
        $table->string("depth")->nullable();
        $table->string("angle")->nullable();
        $table->string("dac")->nullable();
        $table->string("interpret_dis")->nullable();
        $table->string("interpret_size")->nullable();
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
