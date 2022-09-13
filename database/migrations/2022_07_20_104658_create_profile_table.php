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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('family_name');
            $table->string('given_name');
            $table->date('dob');
            $table->string('edu_qualification')->nullable();
            $table->tinyInteger('job_role')->nullable();
            $table->string('work_location')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('skills')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('contact_number_2')->nullable();
            $table->tinyInteger('working_location')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('profile');
    }
};
