<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostPivotTable extends Migration
{

    public function up()
    {

        Schema::create('category_post', function (Blueprint $table) {
            $table->unsignedInteger('post_id');

            $table->foreign('post_id', 'post_id_fk_476513')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedInteger('category_id');

            $table->foreign('category_id', 'category_id_fk_476513')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_post');
    }
}
