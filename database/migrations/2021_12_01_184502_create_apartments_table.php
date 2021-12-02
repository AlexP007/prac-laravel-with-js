<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('rooms');
            $table->integer('meters');
            $table->decimal('price');
            $table->string('city');
            $table->string('address');
            $table->string('metro');
            $table->string('about')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        DB::table('apartments')
            ->insert(
                [
                    "rooms" => 1,
                    "meters" => 2,
                    "price" => 3,
                    "city" => 'Moscow',
                    "address" => 'Red square',
                    "metro" => 'Arbatskaya',
                    "about" => 'Big big apartment',
                    "user_id" => 1
                ]
            );
        DB::table('apartments')
            ->insert(
                [
                    "rooms" => 1,
                    "meters" => 2,
                    "price" => 3,
                    "city" => 'Moscow',
                    "address" => 'Red square',
                    "metro" => 'Arbatskaya',
                    "about" => 'Big big apartment',
                    "user_id" => 1
                ]
            );
        DB::table('apartments')
            ->insert(
                [
                    "rooms" => 1,
                    "meters" => 2,
                    "price" => 3,
                    "city" => 'Moscow',
                    "address" => 'Red square',
                    "metro" => 'Arbatskaya',
                    "about" => 'Big big apartment',
                    "user_id" => 1
                ]
            );
        DB::table('apartments')
            ->insert(
                [
                    "rooms" => 1,
                    "meters" => 2,
                    "price" => 3,
                    "city" => 'Moscow',
                    "address" => 'Red square',
                    "metro" => 'Arbatskaya',
                    "about" => 'Big big apartment',
                    "user_id" => 1
                ]
            );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
