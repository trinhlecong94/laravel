<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address', 255);
            $table->date('birthday', 255);
            $table->string('email', 45);
            $table->string('remember_token', 100)->nullable();;
            $table->string('full_name', 45);
            $table->string('password', 255);
            $table->string('phone', 45);
            $table->integer('status');
            $table->string('username', 45);
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
        Schema::dropIfExists('accounts');
    }
}
