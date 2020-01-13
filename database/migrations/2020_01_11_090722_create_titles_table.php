<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('edition')->default(1);
            $table->integer('stock')->default(0);
            $table->string('isbn');
            $table->string('image');

            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')
                ->references('id')->on('authors')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->unsignedBigInteger('title_status_id')->nullable()->default(2);
            $table->foreign('title_status_id')
                ->references('id')->on('title_statuses')
                ->onDelete('set null')
                ->onUpdate('set null');
                            
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
        Schema::dropIfExists('titles');
    }
}
