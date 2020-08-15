<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLPTReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_p_t_reports', function (Blueprint $table) {
            $table->id();
            //customer details
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

            //sytem details
            $table->string("procedure_no")->nullable();
            $table->string("reference_code")->nullable();
            $table->string("acceptance_criteria")->nullable();
            $table->string("project_spec")->nullable();
            $table->string("material")->nullable();
            $table->string("grade")->nullable();
            $table->string("surface_condition")->nullable();
            $table->string("surface_temperature")->nullable();
            $table->string("weld_process")->nullable();
            $table->string("weld_reinforcement")->nullable();

            //method details
            $table->string("type_of_penetrant")->nullable();
            $table->string("method_of_removal")->nullable();
            $table->string("excess_penetrant_removal")->nullable();
            $table->string("cleaner_batch_no")->nullable();
            $table->string("penetrant_batch_no")->nullable();
            $table->string("developer_batch_no")->nullable();
            $table->string("white_light_level")->nullable();
            $table->string("black_light_level")->nullable();
            $table->string("light_meter_sr_no")->nullable();
            $table->string("penetrant_dwell_time")->nullable();
            $table->string("development_time")->nullable();
            $table->string("drying_time")->nullable();
            $table->string("configuration")->nullable();
            $table->string("drying_aid")->nullable();
            $table->string("chemical_manufacturer")->nullable();

            //final thoughts
            $table->string("date_of_exam")->nullable();
            $table->string("tranid")->nullable();
            $table->string("inspected_by")->nullable();
            $table->string("authorised_by")->nullable();
            $table->string("contractor")->nullable();
            //image

            $table->string("photo_1")->nullable();
            $table->string("photo_2")->nullable();
            $table->string("drawing")->nullable();

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
        Schema::dropIfExists('l_p_t_reports');
    }
}
