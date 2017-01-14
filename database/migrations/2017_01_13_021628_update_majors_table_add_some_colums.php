<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMajorsTableAddSomeColums extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majors', function (Blueprint $table) {
            $table->integer('sort')->after('text');
            $table->string('application_period_max')->after('text');
            $table->string('application_period')->after('text');
            $table->string('language')->after('text');
            $table->string('enrollment')->after('text');
            $table->string('course_term')->after('text');
            $table->string('degree_level')->after('text');
            $table->integer('fs_id')->after('text');
            $table->integer('school_id')->after('text');
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
