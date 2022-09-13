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
        //
        
        Schema::table('profile', function (Blueprint $table) {
            $table->date('doj')->nullable()->after('skills');
            $table->date('dol')->nullable()->after('doj');
            $table->string('salary')->nullable()->after('dol');
            $table->string('loyalty')->nullable()->after('salary');
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
        Schema::table('profile', function (Blueprint $table) {
            $table->dropColumn('doj');
            $table->dropColumn('dol');
            $table->dropColumn('salary');
            $table->dropColumn('loyalty');
        });
    }
};
