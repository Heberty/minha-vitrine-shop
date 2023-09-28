<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default(1);
            $table->integer('active')->default(1);
            $table->string('title');
            $table->string('subtitle');
            $table->string('slug');
            $table->string('author');
            $table->string('fonte');
            $table->string('fonte_link');
            $table->string('thumbnail')->nullable();
            $table->string('image_full');
            $table->text('text');
            $table->integer('blog_id')->unsigned();
            $table->foreign('blog_id')->references('id')->on('blog_types');
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
        Schema::dropIfExists('blogs');
    }
}
