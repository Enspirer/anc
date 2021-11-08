<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInquiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('package_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('email');
            $table->text('contact');
            $table->text('address');
            $table->text('nationality');
            $table->text('airlines');
            $table->text('hotels');
            $table->text('meals');
            $table->text('special_requirements');
            $table->text('budget');
            $table->text('status');
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
        Schema::dropIfExists('inquires');
    }
}
