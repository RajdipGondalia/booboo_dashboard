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
        Schema::table('task', function (Blueprint $table) {
            $table->tinyInteger('isDelete')->default('0')->after('user_id');
            $table->tinyInteger('project_id')->nullable()->after('id');
            $table->tinyInteger('priority')->nullable()->after('due_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropColumn('isDelete');
            $table->dropColumn('project_id');
            $table->dropColumn('priority');
        });
    }
};
