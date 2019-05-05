<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDoctorIdToPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            // ASIGNED A CAMP OF TYPE BIGINTEGER
            $table->unsignedBigInteger('doctor_id'); 
            // ASIGNED FOREIGN KEY TO DOCTOR TO PATIENT
            $table->foreign('doctor_id')->references('id')->on('doctors'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign(['doctor_id']);
            $table->dropColumn('doctor_id');
        });
    }
}
