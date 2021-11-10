<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomizeInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customize_inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('activities')->nullable();
            $table->text('location')->nullable();
            $table->text('accommodation')->nullable();
            $table->text('date_of_start')->nullable();
            $table->text('number_of_dates')->nullable();
            $table->text('budget')->nullable();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->text('address')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('email')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('customize_inquiries');
    }
}
