<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemBelongingList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_belonging_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')->references('list_id')->on('training_menu_lists');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('item_id')->on('training_menu_items');
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
        Schema::dropIfExists('item_belonging_list');
    }
}
