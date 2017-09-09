<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias');
            $table->string('img');
            $table->text('text');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->integer('maker_id')->unsigned();
            $table->foreign('maker_id')
                ->references('id')
                ->on('makers')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->string('type')->nullable();
            $table->string('color')->nullable();
            $table->string('price');
            $table->string('picture')->nullable();
            $table->string('marking')->nullable();
            $table->string('weight')->nullable();

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
        Schema::dropIfExists('products');
    }
}
