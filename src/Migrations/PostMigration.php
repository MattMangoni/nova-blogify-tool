<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostMigration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('image_id')->index();
            $table->unsignedInteger('category_id')->index();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('summary')->nullable();
            $table->text('body');
            $table->boolean('published')->default(false);
            $table->boolean('featured')->default(false);
            $table->timestamp('scheduled_for')->useCurrent();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
