<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPTReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_p_t_reports', function (Blueprint $table) {
            $table->id();

            $table->string("created_by")->nullable();
            $table->string("owner")->nullable();
            $table->string("owner_address")->nullable();
            $table->string("client")->nullable();
            $table->string("client_address")->nullable();
            $table->string("project")->nullable();
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
            $table->string("weld_process")->nullable();
            $table->string("type_of_equip")->nullable();
            $table->string("type_of_current")->nullable();
            $table->string("chemical_manufacture")->nullable();
            $table->string("cleaner_batch_no")->nullable();
            $table->string("contrast_batch_no")->nullable();
            $table->string("black_ink_batch_no")->nullable();
            $table->string("white_light_level")->nullable();
            $table->string("black_light_level")->nullable();
            $table->string("light_meter_sr_no")->nullable();
            $table->string("type_of_particle")->nullable();
            $table->string("particle_medium")->nullable();
            $table->string("type_of_magnetism")->nullable();
            $table->string("configuration")->nullable();
            $table->string("pole_spacing")->nullable();
            $table->string("lifting_capacity")->nullable();
            $table->string("date_of_exam")->nullable();
            $table->string("tranid")->nullable();
            $table->string("inspected_by")->nullable();
            $table->string("authorised_by")->nullable();
            $table->string("contractor")->nullable();

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
        Schema::dropIfExists('m_p_t_reports');
    }
}
