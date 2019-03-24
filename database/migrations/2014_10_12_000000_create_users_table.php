<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100)->index();
            $table->string('family', 100)->index();
            $table->string('email', 100)->unique()->index();
            $table->string('password', 150);
            $table->boolean('is_active')->default(false)->comment('فعال یا غیرفعال بودن اکانت');

            $table->string('verifyToken', 50)->nullable();
            $table->string('username', 100)->index()->nullable();
            $table->string('avatar', 100)->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
