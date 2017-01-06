<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('sponsor_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->date('deadline')->nullable();
            $table->string('contact_admission')->nullable();
            $table->integer('type_of_award')->nullable();
            $table->integer('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('frequency')->nullable();
            $table->integer('type_of_cost_covered')->nullable();
            $table->integer('number_of_awards_granted')->nullable();
            $table->integer('applicable_year')->nullable();
            $table->integer('applicable_year_max')->nullable();
            $table->string('url')->nullable();
            $table->integer('age')->nullable();
            $table->integer('age_max')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('application_method')->nullable();
            $table->integer('application_requirement')->nullable();
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
