<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentPostPivotTable extends Migration

{
    public function up()
    {

        Schema::create('employment_post', function (Blueprint $table) {
            $table->unsignedInteger('post_id');

            $table->foreign('post_id', 'post_id_fk_667152')->references('id')->on('posts')->onDelete('cascade');

            $table->unsignedInteger('employment_id');

            $table->foreign('employment_id', 'employment_id_fk_667152')->references('id')->on('employments')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employment_post');
    }
}
