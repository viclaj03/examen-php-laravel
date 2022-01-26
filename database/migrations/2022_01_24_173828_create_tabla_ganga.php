<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaGanga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gangas', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('title');
            $table->string('description');
            $table->string('url');
            $table->foreignId('id_category')->references('id')->on('categories');
            $table->integer('points');
            $table->float('price');
            $table->float('discount_price');
            $table->boolean('available');
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
        Schema::dropIfExists('gangas');
    }
}
