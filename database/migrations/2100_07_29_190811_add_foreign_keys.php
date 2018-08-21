<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('course_type_id')->references('id')->on('categories');
            $table->foreign('modality_id')->references('id')->on('categories');
            $table->foreign('occupation_area_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['course_type_id']);
            $table->dropForeign(['modality_id']);
            $table->dropForeign(['occupation_area_id']);
        });
    }
}
