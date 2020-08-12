<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned(); // kita sesuaikan dengan attribute yang ada di tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //relasi ke tabel user
            $table->unsignedBigInteger('role_id')->unsigned(); // kita sesuaikan dengan attribute yang ada di tabel roles
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); //relasi ke tabel user
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
        Schema::dropIfExists('role_user');
    }
}
