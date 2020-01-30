<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostPhoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_photos', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');

            $table->integer('photo_id')->unsigned()->nullable();
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
