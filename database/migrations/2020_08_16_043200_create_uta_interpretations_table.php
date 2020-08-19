<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtaInterpretationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uta_interpretations', function (Blueprint $table) {
            $table->id();
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
            $table->string("result")->nullable();
            $table->unsignedBigInteger("u_t_a_report_id")->nullable();
            $table->index("u_t_a_report_id");
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
        Schema::dropIfExists('uta_interpretations');
    }
}
