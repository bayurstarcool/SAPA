<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departement_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned(); // kita sesuaikan dengan attribute yang ada di tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //relasi ke tabel user
            $table->unsignedBigInteger('departement_id')->unsigned(); // kita sesuaikan dengan attribute yang ada di tabel roles
            $table->foreign('departement_id')->references('id')->on('departements')->onDelete('cascade'); //relasi ke tabel departement
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
        Schema::dropIfExists('departement_user');
    }
}
