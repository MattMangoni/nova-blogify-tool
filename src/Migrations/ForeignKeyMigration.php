<?php

namespace Mattmangoni\NovaBlogifyTool\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class ForeignKeyMigration
{
    public function up()
    {
        $usermodel = config('nova-blogify.resources.users.model');
        $usertable = (new $usermodel)->getTable();

        Schema::table(config('nova-blogify.table_prefix').'posts', function (Blueprint $table) use ($usertable) {
            $table->foreign('user_id')->references('id')->on($usertable);
            $table->foreign('category_id')->references('id')->on(config('nova-blogify.table_prefix').'categories');
        });

        Schema::table(config('nova-blogify.table_prefix').'comments', function (Blueprint $table) use ($usertable) {
            $table->foreign('post_id')->references('id')->on(config('nova-blogify.table_prefix').'posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on($usertable)->onDelete('cascade');
        });

        Schema::table(config('nova-blogify.table_prefix').'post_tag', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on(config('nova-blogify.table_prefix').'posts');
            $table->foreign('tag_id')->references('id')->on(config('nova-blogify.table_prefix').'tags');
        });
    }

    public function down()
    {
        Schema::table(config('nova-blogify.table_prefix').'posts', function (Blueprint $table) {
            $table->dropForeign([config('nova-blogify.table_prefix').'user_id']);
            $table->dropForeign([config('nova-blogify.table_prefix').'category_id']);
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign([config('nova-blogify.table_prefix').'post_id']);
            $table->dropForeign([config('nova-blogify.table_prefix').'user_id']);
        });

        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign([config('nova-blogify.table_prefix').'post_id']);
            $table->dropForeign([config('nova-blogify.table_prefix').'tag_id']);
        });
    }
}
