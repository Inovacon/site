<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->boolean('active')->default(false);
            $table->unsignedMediumInteger('minimum_students');
            $table->unsignedMediumInteger('maximum_students');
            $table->unsignedSmallInteger('hours');
            $table->unsignedInteger('course_type_id');
            $table->unsignedInteger('modality_id');
            $table->unsignedInteger('shift_id');
            $table->unsignedInteger('occupation_area_id');
            $table->unsignedInteger('target_audience_id');
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
