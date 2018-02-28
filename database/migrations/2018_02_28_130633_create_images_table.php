<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->text('path');
            $table->integer('article_id')->unsigned();


            $table->index('article_id');

            $table->foreign('article_id', 'article_image')
                  ->references('id')
                  ->on('articles')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
           $table->dropForeign('article_image');
        });

        Schema::dropIfExists('images');
    }
}
