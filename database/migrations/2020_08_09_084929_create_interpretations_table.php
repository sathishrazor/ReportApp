<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterpretationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interpretations', function (Blueprint $table) {
            $table->id();
            $table->string("joint_no")->nullable();
            $table->string("size")->nullable();
            $table->string("parent")->nullable();
            $table->string("weld")->nullable();
            $table->string("section")->nullable();
            $table->string("wire_req")->nullable();
            $table->string("wire_vis")->nullable();
            $table->string("density")->nullable();
            $table->string("discontinuity")->nullable();
            $table->unsignedBigInteger("r_t_report_id");
            $table->index("r_t_report_id");
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
        Schema::dropIfExists('interpretations');
    }
}
