<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingMenuLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_menu_lists', function (Blueprint $table) {
            $table->bigIncrements('list_id');
            $table->string('list_name', '100');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('training_menu_lists', function(Blueprint $table) {
            $table->dropForeign('training_menu_lists_user_id_foreign');
        });
    }
}
