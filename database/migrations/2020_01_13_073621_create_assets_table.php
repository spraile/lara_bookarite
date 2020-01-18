<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asset_code')->nullable()->default(null);

            $table->unsignedBigInteger('asset_status_id')->nullable()->default(1);
            $table->foreign('asset_status_id')
                ->references('id')->on('asset_statuses')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->unsignedBigInteger('title_id')->nullable();
            $table->foreign('title_id')
                ->references('id')->on('titles')
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
        Schema::dropIfExists('assets');
    }
}
