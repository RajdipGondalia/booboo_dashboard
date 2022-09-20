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
        Schema::table('project_vs_comment', function (Blueprint $table) {
            $table->text('attachment_realname')->nullable()->after('attachment_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_vs_comment', function (Blueprint $table) {
            $table->dropColumn('attachment_realname');
        });
    }
};
