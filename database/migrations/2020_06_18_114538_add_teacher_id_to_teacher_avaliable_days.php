<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherIdToTeacherAvaliableDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers_avaliable_days', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->after('day_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers_avaliable_days', function (Blueprint $table) {
            $table->dropColumn('teacher_id');
        });
    }
}
