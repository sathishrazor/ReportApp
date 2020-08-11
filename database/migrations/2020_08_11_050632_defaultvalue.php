<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Defaultvalue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('isactive')->default(0);
            $table->dropColumn('access')->default(0);

        });
        Schema::table('employees', function (Blueprint $table) {
            $table->boolean('isactive')->default(0);
            $table->boolean('access')->default(0);
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
    }
}
