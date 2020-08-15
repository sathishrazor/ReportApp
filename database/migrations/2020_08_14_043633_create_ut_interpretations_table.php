<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtInterpretationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ut_interpretations', function (Blueprint $table) {
            $table->id();
            $table->string("probe_sr_no")->nullable();
            $table->string("probe_size")->nullable();
            $table->string("frequency")->nullable();
            $table->string("transducer_angle")->nullable();
            $table->string("from_face")->nullable();
            $table->string("leg")->nullable();
            $table->string("indication_level_a")->nullable();
            $table->string("reference_level_b")->nullable();
            $table->string("attenuation_factor_c")->nullable();
            $table->string("indication_ratio_d")->nullable();
            $table->string("length")->nullable();
            $table->string("angular_distance")->nullable();
            $table->string("depth_from_surface")->nullable();
            $table->string("distance_from_x")->nullable();
            $table->string("distance_from_y")->nullable();
            $table->string("discontinuity")->nullable();
            $table->string("result")->nullable();
            $table->unsignedBigInteger("u_t_b_report_id")->nullable();
            $table->index("u_t_b_report_id");
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
        Schema::dropIfExists('ut_interpretations');
    }
}
