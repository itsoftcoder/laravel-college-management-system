<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->string('video');
            $table->string('size',100)->nullable();
            $table->string('length',100)->nullable();
            $table->unsignedBigInteger('program_id')->default(0);
            $table->unsignedBigInteger('magazine_id')->default(0);
            $table->unsignedBigInteger('lab_id')->default(0);
            $table->unsignedBigInteger('garden_id')->default(0);
            $table->unsignedBigInteger('pool_id')->default(0);
            $table->timestamps();

            $table->index('program_id');
            $table->index('magazine_id');
            $table->index('lab_id');
            $table->index('garden_id');
            $table->index('pool_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
