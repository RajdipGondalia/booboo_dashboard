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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string('task_title')->nullable();
            $table->string('task_desc')->nullable();
            $table->string('assign_to')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('status')->comment('0=Pending, 1=Start, 2=Stop, 3=Completed, 4=Cancel')->nullable();
            $table->datetime('start_time')->nullable();
            $table->integer('start_by')->nullable();
            $table->datetime('stop_time')->nullable();
            $table->integer('stop_by')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('task');
    }
};
