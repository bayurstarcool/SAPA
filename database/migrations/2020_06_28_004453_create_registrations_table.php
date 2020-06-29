<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedInteger('departement_id'); // kita sesuaikan dengan attribute yang ada di tabel departements
            $table->foreign('departement_id')->references('id')->on('departements'); //relasi ke tabel departements
            $table->unsignedInteger('user_id'); // kita sesuaikan dengan attribute yang ada di tabel users
            $table->foreign('user_id')->references('id')->on('users'); //relasi ke tabel user
            $table->timestamp('estimated_hour');
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
        Schema::dropIfExists('registrations');
    }
}
