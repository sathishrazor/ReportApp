<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRTReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_t_reports', function (Blueprint $table) {
            $table->id();
            $table->string("createdby")->nullable();
            $table->string("owner_name")->nullable();
            $table->string("owner_address")->nullable();
            $table->string("client_name")->nullable();
            $table->string("client_address")->nullable();
            $table->string("project_name")->nullable();
            $table->string("project_address")->nullable();
            $table->string("requested_by")->nullable();
            $table->string("request_no")->nullable();
            $table->string("po_tranno")->nullable();
            $table->string("wo_tranno")->nullable();
            $table->string("procedure_no")->nullable();
            $table->string("reference_code")->nullable();
            $table->string("acceptance_criteria")->nullable();
            $table->string("project_spec")->nullable();
            $table->string("material")->nullable();
            $table->string("grade")->nullable();
            $table->string("surface_condition")->nullable();
            $table->string("surface_temperature")->nullable();
            $table->string("drawing_no")->nullable();
            $table->string("line_no")->nullable();
            $table->string("weld_process")->nullable();
            $table->string("weld_reinforcement")->nullable();
            $table->string("xray_volt_src")->nullable();
            $table->string("src_spot_size")->nullable();
            $table->string("flim_manufacturer")->nullable();
            $table->string("flim_type")->nullable();
            $table->string("flim_in_cassette")->nullable();
            $table->string("technique")->nullable();
            $table->string("sod")->nullable();
            $table->string("ofd")->nullable();
            $table->string("iqi")->nullable();
            $table->string("sensitivity")->nullable();
            $table->string("ug")->nullable();
            $table->string("lead_scr_thickness")->nullable();
            $table->string("configuration")->nullable();
            $table->string("welder_id")->nullable();
            $table->string("technician_1")->nullable();
            $table->string("technician_2")->nullable();
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
        Schema::dropIfExists('r_t_reports');
    }
}
