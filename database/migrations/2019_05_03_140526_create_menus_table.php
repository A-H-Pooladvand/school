<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', static function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('page_id')->nullable();
            $table->timestamps();
            $table->string('title', 40);
            $table->string('link', 190);
            $table->unsignedTinyInteger('priority');

            $table->foreign('page_id')->references('id')->on('menus')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
