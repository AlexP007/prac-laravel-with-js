<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('address');
            $table->string('subway');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('sqrmeters');
            $table->unsignedInteger('price');
            $table->string('image',512)->nullable();
            $table->unsignedInteger('user_id');
            $table->timestamps();
            // город, адрес, метро, комнаты, метраж, цена, фото, пользователь,
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aparts');
    }
}
