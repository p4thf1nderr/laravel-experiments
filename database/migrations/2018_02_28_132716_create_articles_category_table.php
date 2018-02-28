<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_category', function (Blueprint $table) {
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('category_id');

            $table->primary(['article_id', 'category_id']);

            $table->foreign('article_id', 'article_category')
                ->references('id')->on('articles')
                ->onDelete('cascade');

            $table->foreign('category_id', 'category_article')
                ->references('id')->on('categories')
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
        Schema::table('articles_category', function (Blueprint $table) {
            $table->dropForeign('article_category');
            $table->dropForeign('category_article');
        });

        Schema::dropIfExists('articles_category');
    }
}
