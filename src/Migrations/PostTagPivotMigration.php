<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class PostTagPivotMigration
{
    public function up()
    {
        Schema::create('blog_post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_post_tag');
    }
}
