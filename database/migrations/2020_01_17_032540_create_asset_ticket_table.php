<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_ticket', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->foreign('ticket_id')
                ->references('id')->on('tickets')
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->unsignedBigInteger('asset_id')->nullable();
            $table->foreign('asset_id')
                ->references('id')->on('assets')
                ->onDelete('set null')
                ->onUpdate('set null');


            $table->string('title')->nullable();

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
        Schema::dropIfExists('asset_ticket');
    }
}
