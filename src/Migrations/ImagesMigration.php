<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagesMigration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('filename')->unique();
            $table->string('thumbnail')->unique();
            $table->string('size');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
