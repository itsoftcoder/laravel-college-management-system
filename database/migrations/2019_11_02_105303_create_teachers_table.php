<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('profetion');
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender',100);
            $table->string('skills',200)->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanant_address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('about')->nullable();
            $table->string('salary',200)->nullable();
            $table->string('age',100);
            $table->date('join_date')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
