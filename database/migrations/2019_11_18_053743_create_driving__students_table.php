<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivingStudents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->string('father_name',200);
            $table->string('mother_name',200);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('driving_course_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number',100)->nullable();
            $table->string('gender',100);
            $table->string('present_address')->nullable();
            $table->string('permanant_address')->nullable();
            $table->date('join_date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('requested')->nullable()->default(0);
            $table->boolean('status')->default(1);
            $table->string('document')->nullable();
            $table->timestamps();

            $table->index('driving_course_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivingStudents');
    }
}
