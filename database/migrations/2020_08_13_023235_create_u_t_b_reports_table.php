<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUTBReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_t_b_reports', function (Blueprint $table) {
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
   $table->string("weld_preparation")->nullable();

   //method details
   $table->string("ut_equipment")->nullable();
   $table->string("ut_equipment_sr_no")->nullable();
   $table->string("type_of_scan")->nullable();
   $table->string("method_of_test")->nullable();
   $table->string("cable_type")->nullable();
   $table->string("cable_length")->nullable();
   $table->string("v1_block_sr_no")->nullable();
   $table->string("v2_block_sr_no")->nullable();
   $table->string("cal_block_sr_no")->nullable();
   $table->string("couplant")->nullable();
   $table->string("thickness")->nullable();
   $table->string("weld_joint_no")->nullable();

   //final thoughts
   $table->string("calibration_remarks")->nullable();
   $table->string("date_of_exam")->nullable();
   $table->string("tranid")->nullable();
   $table->string("inspected_by")->nullable();
   $table->string("authorised_by")->nullable();
   $table->string("contractor")->nullable();
  //images

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
        Schema::dropIfExists('u_t_b_reports');
    }
}
