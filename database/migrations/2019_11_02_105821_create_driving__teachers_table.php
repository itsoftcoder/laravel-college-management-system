<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivingTeachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('driving_course_id');
            $table->string('skills')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number',100)->nullable();
            $table->string('experience',150)->nullable();
            $table->string('gender',100);
            $table->string('present_address',200)->nullable();
            $table->string('permanant_address',200)->nullable();
            $table->string('salary',100)->nullable();
            $table->boolean('requested')->nullable()->default(0);
            $table->date('join_date')->nullable();
            $table->string('work_hour',100)->nullable();
            $table->text('about')->nullable();
            $table->date('date_of_birth')->nullable();
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
        Schema::dropIfExists('drivingTeachers');
    }
}
