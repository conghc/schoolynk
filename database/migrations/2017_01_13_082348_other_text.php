<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OtherText extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_text', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->integer('faculty_school_id');
            $table->string('name');
            $table->string('content');
            $table->string('type');
            $table->integer('sort');
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
