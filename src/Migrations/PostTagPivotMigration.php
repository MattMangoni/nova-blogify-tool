<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class PostTagPivotMigration
{
    public function up()
    {
        Schema::create(config('nova-blogify.table_prefix').'post_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id');
            $table->unsignedInteger('tag_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('nova-blogify.table_prefix').'post_tag');
    }
}
