<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('trip_id');
            $table->string('name');
            $table->decimal('lon', 11, 8);
            $table->decimal('lat', 11, 8);
            $table->string('path');
            $table->string('photographer');
            $table->string('rating');
            $table->date('date');
            $table->string('type');
            $table->text('text_fr');
            $table->text('text_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
