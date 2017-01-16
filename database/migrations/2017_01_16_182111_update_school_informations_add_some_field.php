<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSchoolInformationsAddSomeField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_informations', function (Blueprint $table) {
            $table->string('lesson_format')->after('texts');
            $table->integer('no_of_students_per_class')->after('texts');
            $table->integer('total_no_of_teachers')->after('texts');
            $table->integer('student_dorm')->after('texts');
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
