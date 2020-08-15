<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUTGTReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_t_g_t_reports', function (Blueprint $table) {
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
               $table->string("drawing_no")->nullable();
               $table->string("line_no")->nullable();

               //method details
               $table->string("ut_equipment")->nullable();
               $table->string("ut_equipment_sr_no")->nullable();
               $table->string("probe_type")->nullable();
               $table->string("probe_angle")->nullable();
               $table->string("probe_frequency")->nullable();
               $table->string("probe_size")->nullable();
               $table->string("probe_sr_no")->nullable();
               $table->string("stop_wedge_sr_no")->nullable();
               $table->string("couplant")->nullable();

               //final thoughts
               $table->string("remarks")->nullable();
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
        Schema::dropIfExists('u_t_g_t_reports');
    }
}
