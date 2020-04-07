<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(2);
            $table->boolean('verified')->default(false);
            $table->string('company')->nullable();
            $table->string('name');
            $table->string('size');
            $table->string('industry');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->default('default.png');
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->LongText('about')->nullable();
            $table->string('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}
