<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalibrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calibrations', function (Blueprint $table) {
            $table->id();

            $table->string("probe_sr_no")->nullable();
            $table->string("size")->nullable();
            $table->string("frequency")->nullable();
            $table->string("angle")->nullable();

            $table->string("type")->nullable();
            $table->string("range")->nullable();
            $table->string("sensitivity_level")->nullable();
            $table->string("scanning_level")->nullable();

            $table->float("hole_1_depth")->nullable();
            $table->float("hole_1_beam")->nullable();
            $table->float("hole_1_amplitude")->nullable();

            $table->float("hole_2_depth")->nullable();
            $table->float("hole_2_beam")->nullable();
            $table->float("hole_2_amplitude")->nullable();

            $table->float("hole_3_depth")->nullable();
            $table->float("hole_3_beam")->nullable();
            $table->float("hole_3_amplitude")->nullable();

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
        Schema::dropIfExists('calibrations');
    }
}
