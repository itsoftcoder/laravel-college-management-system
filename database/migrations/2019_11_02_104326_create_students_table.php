<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('department_id');
            $table->string('father_name',200);
            $table->string('mother_name',200);
            $table->string('email')->nullable();
            $table->string('phone_number',100)->nullable();
            $table->string('roll_no',100);
            $table->string('image')->nullable();
            $table->string('gender',100);
            $table->string('session',100);
            $table->string('present_address')->nullable();
            $table->string('permanant_address')->nullable();
            $table->string('shift')->default('first_shift');
            $table->string('semester',100)->nullable();
            $table->boolean('requested')->nullable()->default(0);
            $table->boolean('status')->default(1);
            $table->string('document')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();

            $table->index('class_id');
            $table->index('department_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
