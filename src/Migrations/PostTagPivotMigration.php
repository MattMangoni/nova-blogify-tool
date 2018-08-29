<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTagPivotMigration
{
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');

            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}