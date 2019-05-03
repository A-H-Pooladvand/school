<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', static function (Blueprint $table) {
            $table->increments('id');
            $table->string('instagram', 190)->nullable();
            $table->string('twitter', 190)->nullable();
            $table->string('linkedin', 190)->nullable();
            $table->string('telegram', 190)->nullable();
            $table->string('address', 190)->nullable();
            $table->string('email', 190)->nullable();
            $table->string('enrollment_background', 190)->nullable();
            $table->string('phone', 190)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
