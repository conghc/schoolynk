<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSchoolInfoAddSomeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('school_informations', function (Blueprint $table) {
            $table->text('course_structure_tuition_fee_c')->after('course_structure_tuition_fee');
            $table->text('course_structure_tuition_fee_b')->after('course_structure_tuition_fee');
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
