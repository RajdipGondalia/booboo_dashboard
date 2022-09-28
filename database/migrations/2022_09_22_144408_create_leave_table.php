<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('leave_user_id')->nullable();
            $table->tinyInteger('leave_type')->nullable();
            $table->text('leave_reason')->nullable();
            $table->date('leave_date_1')->nullable();
            $table->date('leave_date_2')->nullable();
            $table->date('leave_date_3')->nullable();
            $table->date('leave_date_4')->nullable();
            $table->date('leave_date_5')->nullable();
            $table->date('leave_date_6')->nullable();
            $table->date('leave_date_7')->nullable();
            $table->date('cover_date_1')->nullable();
            $table->date('cover_date_2')->nullable();
            $table->date('cover_date_3')->nullable();
            $table->date('cover_date_4')->nullable();
            $table->date('cover_date_5')->nullable();
            $table->date('cover_date_6')->nullable();
            $table->date('cover_date_7')->nullable();
            $table->integer('leave_day_1')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('leave_day_2')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('leave_day_3')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('leave_day_4')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('leave_day_5')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('leave_day_6')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('leave_day_7')->comment('1=Half Day, 2=Full Day')->nullable();
            $table->integer('status')->comment('0=Pending, 1=Approved, 2=Rejected, 3=Cancelled')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('isDelete')->default('0');
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
        Schema::dropIfExists('leave');
    }
};
