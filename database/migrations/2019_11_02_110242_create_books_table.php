<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',200);
            $table->string('image')->nullable();
            $table->string('author_name',200)->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('book_category_id')->nullable();
            $table->string('publication',200)->nullable();
            $table->timestamps();

            $table->index('class_id');
            $table->index('book_category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
