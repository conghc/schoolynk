<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable();
            $table->integer('address')->nullable();
            $table->integer('website')->nullable();
            $table->integer('contact')->nullable();
            $table->text('other_information');
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
