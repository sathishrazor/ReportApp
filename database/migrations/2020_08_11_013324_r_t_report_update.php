<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RTReportUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interpretations', function (Blueprint $table) {
            //
            $table->dropColumn("owner_name");
            $table->dropColumn("client_name");
            $table->dropColumn("project_name");
            $table->dropColumn("requested_by");
            $table->dropColumn("technician_1");
            $table->dropColumn("technician_2");

            $table->unsignedBigInteger('inspected_by')->nullable();
            $table->unsignedBigInteger('authorised_by')->nullable();
            $table->unsignedBigInteger('owner')->nullable();
            $table->unsignedBigInteger('client')->nullable();
            $table->unsignedBigInteger('project')->nullable();
            $table->unsignedBigInteger('technician_1')->nullable();
            $table->unsignedBigInteger('technician_2')->nullable();

            $table->index("inspected_by");
            $table->index("authorised_by");
            $table->index("owner");
            $table->index("client");
            $table->index("project");
            $table->index("technician_1");
            $table->index("technician_2");

        });

        Schema::rename("technicinans", "employees");

        Schema::table('employees', function (Blueprint $table) {

            $table->string("name");
            $table->string("department")->nullable();
            $table->string("created_by")->nullable();
            $table->string("email")->nullable();
            $table->string("entity")->nullable();
            $table->string("level")->nullable();
            $table->string("designation")->nullable();
            $table->string("location")->nullable();
            $table->string("emergency_contact_no")->nullable();
            $table->boolean("isactive");
            $table->boolean("access");

        });

        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string("attention");
            $table->string("addr1")->nullable();
            $table->string("addr2")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("country")->nullable();
            $table->string("zip")->nullable();
            $table->string("phone")->nullable();
            $table->string("geo_lat")->nullable();
            $table->string("geo_lang")->nullable();
            $table->unsignedBigInteger("owner_id")->nullable();
            $table->unsignedBigInteger("client_id")->nullable();
            $table->unsignedBigInteger("employee_id")->nullable();
            $table->unsignedBigInteger("project_id")->nullable();
            $table->index("owner_id");
            $table->index("client_id");
            $table->index("employee_id");
            $table->index("project_id");
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
        //
        Schema::rename("employees","technicinans");
        Schema::dropIfExists('addresses');
    }
}
