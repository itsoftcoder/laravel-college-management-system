<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookCategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->unsignedBigInteger('libary_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('libary_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookCategories');
    }
}
