<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTableSchoolInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ranking');
            $table->string('type_of_school');
            $table->string('setting');
            $table->integer('english_course');
            $table->integer('web_application');
            $table->string('website');
            $table->integer('total_no_of_students');
            $table->integer('total_no_of_international_students');
            $table->integer('tuition_fee');
            $table->integer('tuition_fee_max');
            $table->string('tuition_fee_currency');
            $table->integer('cost_of_living');
            $table->integer('cost_of_living_max');
            $table->string('cost_of_living_currency');
            $table->string('brochure');
            $table->string('contact_admission');
            $table->text('overview');
            $table->text('college_feature');
            $table->text('texts');
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
    }
}
