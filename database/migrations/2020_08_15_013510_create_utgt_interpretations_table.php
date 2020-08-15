<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtgtInterpretationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utgt_interpretations', function (Blueprint $table) {
            $table->id();
            $table->string("equipment")->nullable();
            $table->string("location")->nullable();
            $table->string("base_line")->nullable();
            $table->string("rem_thick_1")->nullable();
            $table->string("rem_thick_2")->nullable();
            $table->string("rem_thick_3")->nullable();
            $table->string("rem_thick_4")->nullable();
            $table->string("rem_thick_5")->nullable();
            $table->string("rem_thick_6")->nullable();
            $table->string("rem_thick_7")->nullable();
            $table->string("rem_thick_8")->nullable();
            $table->string("minimum")->nullable();
            $table->string("corr_allowence")->nullable();
            $table->string("result")->nullable();

            $table->unsignedBigInteger("u_t_g_t_report_id")->nullable();
            $table->index("u_t_g_t_report_id");
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
        Schema::dropIfExists('utgt_interpretations');
    }
}
