<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('apartment_id');
            $table->string('url');
            $table->timestamps();
        });

        DB::table('images')
            ->insert(
                [
                    'apartment_id' => 1,
                    'url' => 'https://laravel.com/img/hero/hero_poster.jpg'
                ]
            );
        DB::table('images')
            ->insert(
                [
                    'apartment_id' => 1,
                    'url' => 'https://laravel.com/img/hero/hero_poster.jpg'
                ]
            );
        DB::table('images')
            ->insert(
                [
                    'apartment_id' => 1,
                    'url' => 'https://laravel.com/img/hero/hero_poster.jpg'
                ]
            );
        DB::table('images')
            ->insert(
                [
                    'apartment_id' => 1,
                    'url' => 'https://laravel.com/img/hero/hero_poster.jpg'
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
        Schema::dropIfExists('images');
    }
}
