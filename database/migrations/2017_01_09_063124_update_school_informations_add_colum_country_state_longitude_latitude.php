<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSchoolInformationsAddColumCountryStateLongitudeLatitude extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_informations', function (Blueprint $table) {
            $table->string('country_code')->after('texts')->default('JP');
            $table->string('state')->after('texts');
            $table->string('longitude')->after('texts');
            $table->string('latitude')->after('texts');
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
